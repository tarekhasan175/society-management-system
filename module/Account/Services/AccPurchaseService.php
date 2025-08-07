<?php


namespace Module\Account\Services;


use Module\Account\Models\Purchase;
use Module\Account\Models\PurchaseDetail;
use Module\Account\Models\Supplier;

class AccPurchaseService
{
    public $invoiceNumberService;
    public $transactionService;
    public $stockService;



    public $purchase;

    public $productStockService;









    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        $this->invoiceNumberService = new InvoiceNumberService();
        $this->transactionService   = new AccountTransactionService();
        $this->stockService         = new StockService();
        $this->productStockService  = new ProductStockService();
    }











    /*
     |--------------------------------------------------------------------------
     | VALIDATE DATA
     |--------------------------------------------------------------------------
    */
    public function validateData($request)
    {

        $request->validate([

            'supplier_id'       => 'required',
            'company_id'        => 'required',
            'product_id.*'      => 'required',
            'quantity.*'        => 'required',
        ]);
    }












    /*
     |--------------------------------------------------------------------------
     | STORE PURCHASE
     |--------------------------------------------------------------------------
    */
    public function storePurchase($request)
    {
        $invoSub =Supplier::find($request->supplier_id);
        $this->purchase = Purchase::create([

            'supplier_id'       => $request->supplier_id,
            'date'              => $request->date,
            'invoice_no'        =>$invoSub->short_name.$this->invoiceNumberService->getPurchaseInvoiceNo($request->company_id),
            'qty_total'         => $request->qty_total ?? 0,
            'qty_amount'        => $request->qty_amount ?? 0,
            'discount_amount'   => $request->discount_amount ?? 0,
            'total_amount'      => $request->total_amount ?? 0,
            'paid_amount'       => $request->paid_amount ?? 0,
            'due_amount'        => $request->due_amount ?? 0,
            'company_id'        => $request->company_id
        ]);
    }












    /*
     |--------------------------------------------------------------------------
     | UPDATE PURCHASE
     |--------------------------------------------------------------------------
    */
    public function updatePurchase($request, $id)
    {

        $this->purchase = Purchase::with('details')->find($id);

        $this->purchase->update([

            'supplier_id'       => $request->supplier_id,
            'date'              => $request->date,
            'qty_total'         => $request->qty_total ?? 0,
            'qty_amount'        => $request->qty_amount ?? 0,
            'discount_amount'   => $request->discount_amount ?? 0,
            'total_amount'      => $request->total_amount ?? 0,
            'paid_amount'       => $request->paid_amount ?? 0,
            'due_amount'        => $request->due_amount ?? 0,
            'company_id'        => $request->company_id
        ]);
    }












    /*
     |--------------------------------------------------------------------------
     | STORE PURCHASE DETAILS
     |--------------------------------------------------------------------------
    */
    public function storePurchaseDetails($request)
    {
        foreach ($request->product_id as $key => $product_id) {

            $detail = PurchaseDetail::create([

                'purchase_id'   => $this->purchase->id,
                'product_id'    => $product_id,
                'quantity'      => $request->quantity[$key],
                'expiry_at'     => $request->expiry_at[$key],
                'production_at' => $request->production_at[$key],
                'price'         => $request->purchase_price[$key],
                'description'   => $request->description[$key] ?? null,
            ]);


            if($request->quantity[$key] != null) {
                $branch_id = null;
                $warehouse_id = null;
                $date = date('Y-m-d', strtotime($request->date));

                // update stock
                $this->productStockService->storeRequisitionStock($detail->id, $this->purchase->invoice_no, "Account Purchase", $this->purchase->date, 0, $detail->quantity, $product_id, 0, $detail->price, $request->company_id, $this->purchase->branch_id , $detail->expiry_at , $detail->production_at);


                $this->productStockService->updateStockInHand($product_id, $this->purchase->company_id, $this->purchase->branch_id, $this->purchase->date, $detail->quantity);


                // $this->stockService->createStock($detail, $request->company_id, $branch_id, $warehouse_id, $product_id, 'In', $date, $request->purchase_price[$key], $request->quantity[$key], $request->quantity[$key]);

                // $this->stockService->stockSummary($product_id, $request->company_id, $branch_id, $warehouse_id);
            }
        }
    }












    /*
     |--------------------------------------------------------------------------
     | UPDATE PURCHASE DETAILS
     |--------------------------------------------------------------------------
    */
    public function updatePurchaseDetails($request)
    {

        PurchaseDetail::where('purchase_id', $this->purchase->id)->whereNotIn('id', array_filter($request->detail_ids))->delete();

        foreach ($request->detail_ids as $key => $detail_id) {


            PurchaseDetail::updateOrCreate([

                'id' => $detail_id
            ], [

                'purchase_id'       => $this->purchase->id,
                'product_id'        => $request->product_id[$key],
                'quantity'          => $request->quantity[$key],
                'price'             => $request->purchase_price[$key],
                'description'       => $request->description[$key] ?? null,
            ]);

        }
    }












    /*
     |--------------------------------------------------------------------------
     | MAKE TRANSACTION
     |--------------------------------------------------------------------------
    */
    public function makeTransaction()
    {
        $cash_account       = $this->transactionService->getCashAccount();          // debit
        $purchase_account   = $this->transactionService->getPurchaseAccount();      // credit
        $customer_account   = optional($this->purchase->supplier)->account;         // credit

        $purchase           = $this->purchase->refresh();
        $invoice_no         = $purchase->invoice_no;
        $date               = $purchase->date;


        $description        = 'Purchase from ' . (optional($purchase->supplier)->name ?? 'Mr. Supplier');

        $this->transactionService->storeTransaction($purchase->company_id, $purchase,    $invoice_no,    $purchase_account,    $purchase->total_amount, 0,  $date, 'debit',     'Purchase', $description);   //  Payable Amount

        $this->transactionService->storeTransaction($purchase->company_id, $purchase,    $invoice_no,    $cash_account,        0, $purchase->paid_amount,   $date, 'credit',    'P.Payment', $description);    //  Paid Amount

        $this->transactionService->storeTransaction($purchase->company_id, $purchase,    $invoice_no,    $customer_account,    $purchase->paid_amount, $purchase->total_amount,   $date, 'credit',    'Supplier Due', $description);    //  Due Amount
    }
}
