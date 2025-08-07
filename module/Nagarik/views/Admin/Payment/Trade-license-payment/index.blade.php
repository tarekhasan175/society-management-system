@extends('layouts.master')

@section('title','Add New User')


@section('css')

    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>
@endsection
<style>
    .form-page {
        display: none;
    }

    .form-page.active {
        display: block;
    }

</style>

@section('content')

    @include('partials._alert_message')
        <div class="form-container">
            <div class="row form-page active">
                <div class="col-sm-12">
                    <div class="widget-box">

                        <div class="widget-header">
                            <h4 class="widget-title">
                                <i class="fa fa-list"></i>  গৃহীত পেমেন্ট তালিকা
                            </h4>
                            <span class="widget-toolbar">
                        <a href="{{ route('trade-license-payment.create') }}">
                                                           পেমেন্ট গ্রহণ


                                                </a>
                    </span>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <div class="row" style="padding: 10px">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-bordered table-responsive table-hover"  style="border: 1px solid #e3e3e3 !important;">
                                            <thead class="table-header">
                                            <tr style="background-color: #eef7ff;">
                                                <th>#</th>
                                                <th>লাইসেন্স প্রয়োগ সনাক্তকরণ</th>
                                                <th>আবেদনকারীর নাম</th>
                                                <th>অর্থ প্রদানের পরিমাণ (টাকা)</th>
                                                <th>তারিখ</th>
                                                <th>ক্রিয়া</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($payments as $payment)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $payment->source->business_name }} ({{ $payment->source->businessCategory->type }}, {{ $payment->financialYear->start_year }}-{{ $payment->financialYear->end_year }})</td>
                                                    <td>{{ $payment->source->user->name }} ({{ $payment->source->user->phone }})</td>
                                                    <td>{{ floatval($payment->amount) }}</td>
                                                    <td>{{ $payment->date }}</td>
                                                    <td>
                                                        <div class="btn-group btn-corner  action-span ">
                                                            <a href="trade-license-payment-pos-invoice/{{ $payment->id }}" role="button" class="btn btn-xs bs-tooltip" style="background-color: #00be59 !important; border: 1px solid #00be59 !important;" title="POS Print">
                                                                <i class="fa fa-print"></i>
                                                            </a>
                                                            <a href="{{ route('trade-license-payment.show', $payment->id) }}" role="button" class="btn btn-xs bs-tooltip" style="background-color: #0076ff !important; border: 1px solid #0076ff !important;" title="Normal Print">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
