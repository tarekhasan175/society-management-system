<?php

namespace Module\Account\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Traits\CheckPermission;
use Mockery\Exception;
use Module\Account\Models\ProductBrands;
use Module\Account\Models\ProductModels;
use Module\Account\Models\Unit;
use Illuminate\Support\Facades\DB;
use Module\Account\Models\Product;
use Module\Account\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Module\Account\Services\ProductStockService;
use League\Csv\Reader;
use League\Csv\InvalidArgument;
use function React\Promise\all;

class ProductController extends Controller
{
    use CheckPermission;


    public $stockService;

    use FileSaver;
    private $service;





    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct()
    {

        $this->stockService       = new ProductStockService();
    }





    public function index()
    {

        $this->hasAccess("account-products.index");

        $products   = Product::userCompanies()->with('category', 'unit','model','brand')->whereIn('product_type', ['0', 'account_prod'])->userLog()->latest()->get();

        return view('product.products.index', compact('products'));
    }




    public function create(Request $request)
    {
        $this->hasAccess("account-products.create");

        $categories = Category::orderBy('name')->pluck('name', 'id');
        $units      = Unit::orderBy('name')->pluck('name', 'id');
        $brand      = ProductBrands::orderBy('name')->pluck('name', 'id');
        $model      = ProductModels::orderBy('name')->pluck('name', 'id');

        if ($request->csv)
        {
            return view('product.products.bulkUpload');
        }
        else
        {
            return view('product.products.create', compact('categories', 'units','brand','model'));
        }
    }



    // : RedirectResponse
    public function store(Request $request)
    {
        $this->hasAccess("account-products.create");
//return $request->all();
        if ($request->csv)
        {
            $request->validate([
                'csv_file' => 'required|file|mimes:csv,txt',
            ]);

             $path = $request->file('csv_file')->store('csv_files');
             $this->processCsv(storage_path('app/' . $path));
            return redirect()->route('products.index')->with('message', 'CSV file uploaded and processed successfully.');
        }
        else{




        $request->validate([
            'name'          => 'required',
            'category_id'   => 'required',
            'unit_id'       => 'required',
            'model_id'      => 'required',
            'brand_id'      => 'required',
        ]);

        DB::beginTransaction();


        $product = Product::create([

            'name'              => $request->name,
            'category_id'       => $request->category_id,
            'unit_id'           => $request->unit_id,
            'model_id'          => $request->model_id,
            'brand_id'          => $request->brand_id,
            'purchase_price'    => $request->purchase_price ?? 0,
            'product_type'      => 'account_prod',
            'selling_price'     => $request->selling_price ?? 0,
            'opening_quantity'  => $request->opening_quantity ?? 0,
            'current_stock'     => 0.00,
            'description'       => $request->description,
        ]);
        $this->upload_file($request->image, $product, 'image', 'image/Product_upload');
        $product->update([

            'product_code' => 'prod-' . $product->id . '-' . time()
        ]);

            if ($request->opening_quantity > 0) {

                $this->stockService->storeRequisitionStock($product->id, ('product-10000' . $product->id), "Account Product Opening", date('Y-m-d'), 0, $product->opening_quantity, $product->id, 0, $product->purchase_price, $request->company_id, $request->factory_id , $request->expiry_at);

                $this->stockService->updateRmStock($product->id, $request->company_id, $request->factory_id, $request->req_purchase_receive_date, $product->opening_quantity, $request->purchase_price);

            }
        DB::commit();
        }
        return redirect()->route('products.index')->with('message', 'Product Create Successful');
    }


    private function processCsv($filePath)
    {
        try {
             $csv = Reader::createFromPath($filePath, 'r');
            $csv->setHeaderOffset(0);

             $headers = $csv->getHeader();
            if (count($headers) !== count(array_unique($headers))) {
                throw new Exception('The header record contains duplicate column names.');
            }

             foreach ($csv as $record) {

                 if ($this->isRowEmpty($record)) {
                     continue;
                 }
                Product::create([
                    'name'              => $record['name'] ?? 'Unnamed Product',
                    'category_id'       => $this->parseInt($record['category_id']),
                    'unit_id'           => $this->parseInt($record['unit_id']),
                    'purchase_price'    => $this->parseFloat($record['purchase_price'], 0),
                    'product_type'      => 'account_prod',
                    'selling_price'     => $this->parseFloat($record['selling_price'], 0),
                    'opening_quantity'  => $this->parseFloat($record['opening_quantity'], 0),
                    'current_stock'     => 0.00,
                    'description'       => $record['description'] ?? '',
                    'created_by'        => 1,
                    'updated_by'        => 1,
                    'company_id'        => 1,
                ]);
            }

            return 'CSV file uploaded and processed successfully.';
        } catch (Exception $e) {
             return 'Error: ' . $e->getMessage();
        } catch (\Exception $e) {
             return 'An error occurred while processing the CSV file.';
        }
    }

    private function isRowEmpty($record)
    {
         foreach ($record as $value) {
            if (!empty(trim($value))) {
                return false;
            }
        }
        return true;
    }
    private function parseInt($value, $default = 0)
    {
        return is_numeric($value) ? (int)$value : $default;
    }

    private function parseFloat($value, $default = 0.0)
    {
        return is_numeric($value) ? (float)$value : $default;
    }






    public function edit(Product $product)
    {
        $this->hasAccess("account-products.edit");

        $categories = Category::orderBy('name')->pluck('name', 'id');
        $units      = Unit::orderBy('name')->pluck('name', 'id');
        $brand      = ProductBrands::orderBy('name')->pluck('name', 'id');
        $model      = ProductModels::orderBy('name')->pluck('name', 'id');

        return view('product.products.edit', compact('product', 'categories', 'units','brand','model'));
    }





    public function update(Request $request, Product $product): RedirectResponse
    {

        $this->hasAccess("account-products.edit");
//return $request->all();
        $request->validate([
            'name'          => 'required',
            'category_id'   => 'required',
            'unit_id'       => 'required'
        ]);

        $product->update(
            [
                'name'              => $request->name,
                'category_id'       => $request->category_id,
                'unit_id'           => $request->unit_id,
                'model_id'          => $request->model_id,
                'brand_id'          => $request->brand_id,
                'purchase_price'    => $request->purchase_price ?? 0,
                'selling_price'     => $request->selling_price ?? 0,
                'opening_quantity'  => $request->opening_quantity ?? 0,
                'product_type'      => 'account_prod',
                'current_stock'     => 0.00,
                'description'       => $request->description,
            ]
        );

        if ($request->hasFile('image')) {
            $oldFilePath = public_path('assets/image/Product_upload' . $product->file);
            if (file_exists($oldFilePath) && is_file($oldFilePath)) {
                unlink($oldFilePath);
            }
            $this->upload_file($request->image, $product, 'image', 'image/Product_upload');
        }
        $this->stockService->updateUpdateRmStock($product->id, $request->company_id, $request->factory_id, $request->req_purchase_receive_date , $product->opening_quantity  ,$request->purchase_price);

        return redirect()->route('products.index')->with('message', 'Product Update Successful');
    }






    public function destroy($id)
    {
        $this->hasAccess("account-products.delete");

        try {
            Product::destroy($id);

            return redirect()->route('products.index')->with('message', 'Product Successfully Deleted!');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
