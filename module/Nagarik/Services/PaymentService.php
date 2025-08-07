<?php
namespace Module\Nagarik\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Module\Account\Services\AccReceiveVoucherService;
use Module\Nagarik\Models\HoldingTexApply;
use Module\Nagarik\Models\OldTradeLicenseModel;
use Module\Nagarik\Models\PaymentModel;

class PaymentService
{
    private $service;

    public function __construct()
    {
       $this->service      = new AccReceiveVoucherService();
    }

    public function newPayment(Request $request, $source_type)
    {
        $payment = PaymentModel::updateOrCreate(
            [
                'id'             => $request->license_info,
            ],
            [
                'date'           => Carbon::now(),
                'status'         => 1,
            ]
        );

        DB::transaction(function () use($request, $payment) {
            $debit = [$payment->amount, "0"];
            $credit = ["0", $payment->amount];
            $request->merge(
                [
                    'voucher_type' => 'Receive',
                    'company_id'   => 1,
                    'reference'    => $payment->source_type."=".$payment->source_id,
                    'date'         => Carbon::now(),
                    'account_ids'  => $request->account,
                    'debit'        => $debit,
                    'credit'       => $credit,
                    'description'  => 'Trade License Payment',
                    'draft'        => 0,
                ]
            );
            $this->service->validateData($request);
            $this->service->storeReceiveVoucher($request);
            $this->service->storeReceiveVoucherDetailsForNagarikModule($request);
            if ($request->draft == 0) {
                $this->service->approveVoucher();
                $this->service->makeTransaction();
            }
            $this->service->invoiceNumberService->setNextInvoiceNo($request->company_id, 'Receive Voucher', date('Y'));
        });

        return $payment->id;
    }

    public function generateDuePayment($trade, $source_type){
        $payment = PaymentModel::updateOrCreate(
        [
            'id'             => null,
        ],
        [
            'source_type'       => $source_type,
            'source_id'         => $trade->id,
            'amount'            => $trade->license_fee+($trade->license_fee*(companyInfo()->company_details->vat/100)),
            'financial_year_id' => $trade->financial_year_id,
            'date'              => Carbon::now(),
            'status'            => 0,
        ]);
    }

    public function generateDuePaymentForAll($licenseFeeForFinancialYear, $source_type){
        $licenses = OldTradeLicenseModel::where(['business_category_id' => $licenseFeeForFinancialYear->nagorik_business_type_id, 'status'=>1])->get();
        foreach ($licenses as $license){
            $generatePayment[] =    [
                'id'                => null,
                'source_type'       => $source_type,
                'source_id'         => $license->id,
                'amount'            => $licenseFeeForFinancialYear->l_fee+($licenseFeeForFinancialYear->l_fee*(companyInfo()->company_details->vat/100)),
                'financial_year_id' => $licenseFeeForFinancialYear->financial_year_id,
                'date'              => Carbon::now(),
                'status'            => 0,
            ];
        }
        PaymentModel::insert($generatePayment ?? []);
    }


    //Holding Tex
    public function ApproveHoldingMakeDuePaymen(  $ApproveHolidng, $source_type)
    {
        $payment = PaymentModel::updateOrCreate(
            [
                'id'             => null,
            ],
            [
                'source_type'    => $source_type,
                'source_id'      => $ApproveHolidng->id,
                'date'           => Carbon::now(),
                'status'         => 0,
            ]
        );
    }

    public function newHoldingPayment(Request $request, $source_type)
    {
        $payment = PaymentModel::updateOrCreate(
            [
                'source_id'       => $request->address_info,
            ],
            [
                'amount'         => $request->paid_amount,
                'date'           => Carbon::now(),
                'status'         => 1,
            ]
        );


        DB::transaction(function () use($request, $payment) {
            $debit = [$payment->amount, "0"];
            $credit = ["0", $payment->amount];
            $request->merge(
                [
                    'voucher_type' => 'Receive',
                    'company_id'   => 1,
                    'reference'    => $payment->source_type."=".$payment->source_id,
                    'date'         => Carbon::now(),
                    'account_ids'  => $request->account,
                    'debit'        => $debit,
                    'credit'       => $credit,
                    'description'  => 'Holding Tex Payment',
                    'draft'        => 0,
                ]
            );
            $this->service->validateData($request);
            $this->service->storeReceiveVoucher($request);
            $this->service->storeReceiveVoucherDetailsForNagarikModule($request);
            if ($request->draft == 0) {
                $this->service->approveVoucher();
                $this->service->makeTransaction();
            }
            $this->service->invoiceNumberService->setNextInvoiceNo($request->company_id, 'Receive Voucher', date('Y'));
        });

        return $payment->id;
    }


}
