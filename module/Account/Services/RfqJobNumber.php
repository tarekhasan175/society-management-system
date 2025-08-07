<?php


namespace Module\Account\Services;


use Module\Account\Models\Purchase;
use Module\Account\Models\PurchaseDetail;
use Module\Account\Models\RfqJobNumberDetails;

class RfqJobNumber
{
    public $invoiceNumberService;
    public $transactionService;
    public $stockService;



    public $purchase;
    public $purchases;

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

//            'supplier_id'       => 'required',
//            'company_id'        => 'required',
//            'product_id.*'      => 'required',
//            'quantity.*'        => 'required',
        ]);
    }












    /*
     |--------------------------------------------------------------------------
     | STORE PURCHASE
     |--------------------------------------------------------------------------
    */
    public function storePurchase($request)
    {
        $this->purchase = \Module\Account\Models\RfqJobNumber::create([

            'client_company_id'       => $request->client_company_id,
            'rfq_customers_id'        => $request->rfq_customers_id,
            'po_accounts_id'          => $request->po_accounts_id,
            'date'                    => now(),
//            'invoice_no'              => $this->invoiceNumberService->getPurchaseInvoiceNo($request->company_id),
            'discount_amount'         => $request->discount_amount ?? 0,
            'amount'                  => $request->amount ?? 0,
            'discount_percentage'     => $request->discount_percentage ?? 0,
            'total_amount'            => $request->total_amount ?? 0,

        ]);
        $this->purchase->update([
            'invoice_no'              => $this->purchase->ClientCompany->sort_name.$this->invoiceNumberService->getPurchaseInvoiceNo($this->purchase->id) . $this->purchase->id,
        ]);

    }












    /*
     |--------------------------------------------------------------------------
     | UPDATE PURCHASE
     |--------------------------------------------------------------------------
    */
    public function updatePurchase($request, $id)
    {

        $this->purchase = \Module\Account\Models\RfqJobNumber::find($id);


        if (!$this->purchase) {
            throw new \Exception("RfqJobNumber not found.");
        }


        $this->purchase->update([
            'client_company_id'       => $request->client_company_id,
            'rfq_customers_id'        => $request->rfq_customers_id,
            'po_accounts_id'          => $request->po_accounts_id,
            'date'                    => now(),
            'discount_amount'         => $request->discount_amount ?? 0,
            'amount'                  => $request->amount ?? 0,
            'discount_percentage'     => $request->discount_percentage ?? 0,
            'total_amount'            => $request->total_amount ?? 0,
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

            $detail = RfqJobNumberDetails::create([

                'rfq_job_numbers_id'         => $this->purchase->id,
                'products_id'                => $product_id,
                'quantity'                   => $request->quantity[$key],
                'price'                      => $request->price[$key],
                'item'                       => $request->item[$key],
                'description'                => $request->description[$key],
                'worker_name'                => $request->worker_name[$key] ?? null,
            ]);


//            if($request->quantity[$key] != null) {
//                $branch_id = null;
//                $warehouse_id = null;
//                $date = date('Y-m-d', strtotime($request->date));
//
//                // update stock
//                $this->productStockService->storeRequisitionStock($detail->id, $this->purchase->invoice_no, "Quotation Purchase", $this->purchase->date, 0, $detail->quantity, $product_id, 0, $detail->price, $request->po_accounts_id, $this->purchase->branch_id);
//
//
//                $this->productStockService->updateStockInHand($product_id, $this->purchase->po_accounts_id, $this->purchase->branch_id, $this->purchase->date, $detail->quantity);
//
//





                // $this->stockService->createStock($detail, $request->company_id, $branch_id, $warehouse_id, $product_id, 'In', $date, $request->purchase_price[$key], $request->quantity[$key], $request->quantity[$key]);

                // $this->stockService->stockSummary($product_id, $request->company_id, $branch_id, $warehouse_id);
//            }
        }
    }












    /*
     |--------------------------------------------------------------------------
     | UPDATE PURCHASE DETAILS
     |--------------------------------------------------------------------------
    */
    public function updatePurchaseDetails($request)
    {

        RfqJobNumberDetails::where('rfq_job_numbers_id', $this->purchase->id)->delete();

        foreach ($request->product_id as $key => $product_id) {

            RfqJobNumberDetails::create([
                'rfq_job_numbers_id' => $this->purchase->id,
                'products_id' => $product_id,
                'quantity' => $request->quantity[$key],
                'price' => $request->price[$key],
                'item' => $request->item[$key],
                'description' => $request->description[$key],
                'worker_name' => $request->worker_name[$key] ?? null,
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


        $description        = 'Job Number from ' . (optional($purchase->supplier)->name ?? 'Mr. Supplier');

        $this->transactionService->storeTransaction($purchase->company_id, $purchase,    $invoice_no,    $purchase_account,    $purchase->total_amount, 0,  $date, 'debit',     'Purchase', $description);   //  Payable Amount

        $this->transactionService->storeTransaction($purchase->company_id, $purchase,    $invoice_no,    $cash_account,        0, $purchase->paid_amount,   $date, 'credit',    'P.Payment', $description);    //  Paid Amount

        $this->transactionService->storeTransaction($purchase->company_id, $purchase,    $invoice_no,    $customer_account,    $purchase->paid_amount, $purchase->total_amount,   $date, 'credit',    'Supplier Due', $description);    //  Due Amount
    }
}
