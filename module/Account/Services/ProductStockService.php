<?php

namespace Module\Account\Services;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Module\Account\Models\ProductStock;
use Module\Account\Models\ProductStockDetail;

class ProductStockService
{


    /*
     |--------------------------------------------------------------------------
     | RECEIVE NUMBER  jjj
     |--------------------------------------------------------------------------
    */


    /*
   |--------------------------------------------------------------------------
   | For Purchase
   |--------------------------------------------------------------------------
  */
    public function storeRequisitionStock($source_id, $source_number, $type, $date, $debit_qty, $credit_qty, $product_id, $debit_rate, $credit_rate, $company_id, $factory_id , $expiry_at= null ,$production_at= null)
    {
        $lot = strtoupper(Str::random(5));

        ProductStockDetail::create([

            'product_id'    => $product_id,
            'company_id'    => $company_id,
            'factory_id'    => $factory_id,
            'expiry_at'     => $expiry_at ?? '' ,
            'production_at' => $production_at ?? '' ,
            'lot'           => $lot,
            'date'          => $date,
            'type'          => $type,
            'source_id'     => $source_id,
            'source_number' => $source_number,
            'debit_qty'     => $debit_qty,
            'debit_rate'    => $debit_rate,
            'credit_qty'    => $credit_qty,
            'credit_rate'   => $credit_rate
        ]);
    }



    /*
     |--------------------------------------------------------------------------
     | For Sale
     |--------------------------------------------------------------------------
    */
    public function storeSaleRequisitionStock($source_id, $source_number, $type, $date, $debit_qty, $credit_qty, $product_id, $debit_rate, $credit_rate, $company_id, $factory_id )
    {
        $lot = strtoupper(Str::random(5));

        ProductStockDetail::create([

            'product_id'    => $product_id,
            'company_id'    => $company_id,
            'factory_id'    => $factory_id,
            'lot'           => $lot,
            'date'          => $date,
            'type'          => $type,
            'source_id'     => $source_id,
            'source_number' => $source_number,
            'debit_qty'     => $debit_qty,
            'debit_rate'    => $debit_rate,
            'credit_qty'    => $credit_qty,
            'credit_rate'   => $credit_rate
        ]);
    }

    /*
     |--------------------------------------------------------------------------
     | UPDATE STOCK IN HAND
     |--------------------------------------------------------------------------
    */
    public function updateStockInHand($product_id, $company_id, $branch_id, $date, $qty = 0, $purpose = '')
    {

        $stockInHand = ProductStock::where('product_id', $product_id)
            ->where('company_id', $company_id)
            ->where('branch_id', $branch_id)
            ->first();


        if (!$stockInHand) {


            $stockInHand = ProductStock::create([

                'product_id' => $product_id,
                'company_id' => $company_id,
                'branch_id' => $branch_id,
                'date' => $date,
                'stock' => $qty,
                'avg_rate' => 0
            ]);
        }


        $stockDetails = ProductStockDetail::where('product_id', $product_id)
            ->where('company_id', $company_id)
            ->where('branch_id', $branch_id)
            ->get();


        $totalDebitQty = $stockDetails->sum('debit_qty');
        $totalCreditQty = $stockDetails->sum('credit_qty');


        $totalDebitAmount = $stockDetails->sum(function ($item) {
            return $item->debit_qty * $item->debit_rate;
        });

        $totalCreditAmount = $stockDetails->sum(function ($item) {
            return $item->credit_qty * $item->credit_rate;
        });


        $totalStock = $totalCreditQty - $totalDebitQty;

        // if ($totalCreditQty > $totalDebitQty) {
        //     $totalStock     = $totalCreditQty - $totalDebitQty;
        // } else {
        //     $totalStock     = $totalDebitQty - $totalCreditQty;
        // }

        $totalAmount = $totalCreditAmount - $totalDebitAmount;

        // if ($totalCreditAmount > $totalDebitAmount) {
        //     $totalAmount    = $totalCreditAmount - $totalDebitAmount;
        // } else {
        //     $totalAmount    = $totalDebitAmount - $totalCreditAmount;
        // }

        $averageRate = 0;


        if ($totalStock != 0) {

            $averageRate = $totalAmount / $totalStock;
        }


        // dd($totalCreditQty, $totalDebitQty, $totalStock);

        // if ($purpose == 'sale') {

        //     $totalStock = $stockInHand->stock - $qty;
        // }

        $stockInHand->update([

            'date' => $date,
            'stock' => $totalStock,
            'avg_rate' => $averageRate
        ]);

        return $totalStock;
    }


    public function updateRmStock($product_id, $company_id, $branch_id, $date, $qty , $purchase)
    {


        $stockInHand = ProductStock::create([

            'product_id' => $product_id,
            'company_id' => 1,

            'date' => now(),
            'stock' => $qty,
            'avg_rate' =>$purchase,
        ]);
    }

    public function updateUpdateRmStock($product_id, $company_id, $branch_id, $date, $qty , $purchase)
    {

        $remStock = ProductStock::where('product_id', $product_id)->first();

        if ($remStock) {
            $remStock->update([
                'company_id' => 1,
                'date' => now(),
                'stock' => $qty,
                'avg_rate' =>$purchase,
            ]);
        } else {
            $stockInHand = ProductStock::create([
                'product_id' => $product_id,
                'company_id' => 1,
                'date' => now(),
                'stock' => $qty,
                'avg_rate' => 0
            ]);
        }

    }

}
