<?php


namespace Module\Account\Services;

use Module\Account\Models\Account_Quotation;
use Module\Account\Models\AccountQuotationDetails;
use Module\Account\Models\Sale;
use Module\Account\Models\SaleDetail;

class AccQuotation
{
    public $invoiceNumberService;
    private $transactionService;
    public $stockService;
    public $productStockService;



    public $sale;









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

//            'customer_id'               => 'required',
//            'company_id'                => 'required',
//            'date'                      => 'required',
//            'amount'                    => 'amount',
//            'total_amount'              => 'total_amount',
//            'item'                      => 'item',

        ]);
    }












    /*
     |--------------------------------------------------------------------------
     | STORE SALE
     |--------------------------------------------------------------------------
    */
    public function storeSale($request)
    {

        $this->sale = Account_Quotation::create([
            'rfq_customers_id'       => $request->rfq_customers_id,
            'client_company_id'      => $request->client_company_id,
            'date'                   => $request->date,
//            'invoice_no'             => $this->invoiceNumberService->getQuotationInvoiceNo($this->id),
            'amount'                 => $request->amount ?? 0,
            'discount_amount'        => $request->discount_amount ?? 0,
            'discount_percentage'    => $request->discount_percentage ?? 0,
            'total_amount'           => $request->total_amount ?? 0,
            'company_id'             => $request->company_id
        ]);
        $this->sale->update([
            'invoice_no'             => $this->sale->ClientCompany->sort_name.$this->invoiceNumberService->getQuotationInvoiceNo( $this->sale->id) .  $this->sale->id,
        ]);
    }












    /*
     |--------------------------------------------------------------------------
     | UPDATE SALE
     |--------------------------------------------------------------------------
    */
    public function updateSaleDd($request, $id)
    {

        $this->sale = Sale::with('details')->find($id);

        $this->sale->update([

            'customer_id'       => $request->customer_id,
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
     | STORE SALE DETAILS
     |--------------------------------------------------------------------------
    */
    public function storeSaleDetails($request)
    {

        foreach ($request->item as $key => $product_id) {

            $detail = AccountQuotationDetails::create([

                'quotation_id'  => $this->sale->id,
                'item'          => $product_id,
                'qty'           => $request->qty[$key],
                'rate'          => $request->rate[$key],
                'tax'           => $request->tax[$key],
                'description'   => $request->description[$key] ?? null,
            ]);

//            if($request->quantity[$key] != null) {



                // update stock
//                $this->productStockService->storeRequisitionStock($detail->id, $this->sale->invoice_no, "Account Sale", $this->sale->date, $detail->quantity, 0, $product_id, 0, $detail->price, $request->company_id, $this->sale->branch_id);


//                $this->productStockService->updateStockInHand($product_id, $this->sale->company_id, $this->sale->branch_id, $this->sale->date, $detail->quantity);









                // $branch_id = null;
                // $warehouse_id = null;
                // $date = date('Y-m-d', strtotime($request->date));

                // $this->stockService->createStock($detail, $request->company_id, $branch_id, $warehouse_id, $product_id, 'Out', $date, $request->sale_price[$key], $request->quantity[$key], -$request->quantity[$key]);

                // $this->stockService->stockSummary($product_id, $request->company_id, $branch_id, $warehouse_id);
//            }
        }
    }












    /*
     |--------------------------------------------------------------------------
     | UPDATE SALE DETAILS
     |--------------------------------------------------------------------------
    */
    public function updateSaleDetailsD($request)
    {

        SaleDetail::where('sale_id', $this->sale->id)->whereNotIn('id', array_filter($request->detail_ids))->delete();

        foreach ($request->detail_ids as $key => $detail_id) {


            SaleDetail::updateOrCreate([

                'id' => $detail_id
            ], [

                'sale_id'       => $this->sale->id,
                'product_id'    => $request->product_id[$key],
                'quantity'      => $request->quantity[$key],
                'price'         => $request->sale_price[$key],
                'description'   => $request->description[$key] ?? null,
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
        $cash_account       = $this->transactionService->getCashAccount();    // credit
        $sale_account       = $this->transactionService->getSaleAccount();    // debit
        $customer_account   = optional($this->sale->customer)->account;       // debit

        $sale               = $this->sale->refresh();
        $invoice_no         = $sale->invoice_no;
        $date               = $sale->date;


        $description        = 'Sale to ' . (optional($sale->customer)->name ?? 'Mr. Customer');


        $this->transactionService->storeTransaction($sale->company_id, $sale,    $invoice_no,    $sale_account,      0, $sale->total_amount,  $date, 'credit', 'Sale', $description);   //  Payable Amount

        $this->transactionService->storeTransaction($sale->company_id, $sale,    $invoice_no,    $cash_account,      $sale->paid_amount, 0,  $date, 'debit', 'Payment', $description);    //  Paid Amount

        $this->transactionService->storeTransaction($sale->company_id, $sale,    $invoice_no,    $customer_account,  $sale->total_amount, $sale->paid_amount,    $date, 'debit', 'Customer Due', $description);    //  Due Amount
    }

}



