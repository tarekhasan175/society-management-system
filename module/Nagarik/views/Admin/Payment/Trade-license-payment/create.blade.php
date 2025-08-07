@extends('layouts.master')

@section('title','Add New User')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/payment-form.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
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
    <form action="{{ route('trade-license-payment.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-container">
            <div class="row form-page active">
                <div class="col-sm-12">
                    <div class="widget-box">

                        <div class="widget-header">
                            <h4 class="widget-title">
                                <i class="fa fa-plus-circle"></i>
                                 {{ __('language.payment_tl_accept') }}
                            </h4>
                            <span class="widget-toolbar">
                        <a href="{{ route('trade-license-payment.index') }}">
                                                            {{ __('language.accept_payment_list') }}


                                                </a>
                    </span>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <div class="row" style="padding: 10px">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="new-html-container">
                                            <div class="payment-card mt-50 mb-50">
                                                <div class="payment-card-title mx-auto align-center">
                                                    {{ __('language.payment') }}
                                                    <span id="payment-card-header"><br>
                                                         {{ __('language.payment_info') }}</span>
                                                </div>
                                                <form>

                                                    <div class="row row-1">
                                                        <div class="col-2">  {{ __('language.Financial_year') }}</div>
                                                        <div class="col-7">
                                                            <select name="financial_year_id" id="fyear"
                                                                    class="form-control" onchange="financialYearSelect()" required data-error-msg="Please select a financial year" >
                                                                <option disabled selected>--{{ __('language.select') }}--</option>
                                                                @foreach($financialYears as $financialYear)
                                                                    <option value="{{ $financialYear->id }}">{{ $financialYear->start_year }}-{{ $financialYear->end_year }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-3 d-flex justify-content-center" style="height: 10px">

                                                        </div>
                                                    </div>
                                                    <div class="row row-1">
                                                        <div class="col-2">  {{ __('language.license_identification') }}</div>
                                                        <div class="col-7">
                                                            <select name="license_info" id="license_info" onchange="licenseInfoSelect()"
                                                                    class="form-control" required data-error-msg="Please select a license_info" >
                                                                <option disabled selected>--{{ __('language.select') }}--</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-3 d-flex justify-content-center" style="height: 10px">

                                                        </div>
                                                    </div>
                                                    <div class="row row-1">
                                                        <div class="col-2"> {{ __('language.applicants_name') }}</div>
                                                        <div class="col-7">
                                                            <input name="applicant_name" type="text" id="applicant_name"
                                                                   class="form-control col-md-7 col-xs-12"
                                                                   ReadOnly="true" required/>
                                                        </div>
                                                        <div class="col-3 d-flex justify-content-center" style="height: 10px">

                                                        </div>
                                                    </div>

                                                    <div class="row row-1">
                                                        <div class="col-2">  {{ __('language.licence_fee') }} <span style="font-size: 10px !important; color: red;"> (  {{ __('language.include') }} {{ companyInfo()->company_details->vat }}% {{ __('language.vat') }})</span></div>
                                                        <div class="col-7">
                                                            <input name="paid_amount" type="text" id="paid_amount"
                                                                   class="form-control col-md-7 col-xs-12" readonly
                                                                   required/>
                                                        </div>
                                                        <div class="col-3 d-flex justify-content-center" style="height: 10px">

                                                        </div>
                                                    </div>

                                                    <div class="row row-1">
                                                        <div class="col-2">  {{ __('language.Account') }}</div>
                                                        <div class="col-7">
                                                            <select name="account" id="account"
                                                                    class="form-control" required data-error-msg="Please select a account" >
                                                                <option disabled selected>--{{ __('language.select') }}--</option>
                                                                @foreach($accounts as $account)
                                                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-3 d-flex justify-content-center" style="height: 10px">

                                                        </div>
                                                    </div>
                                                    <button type="submit" class="payment-btn d-flex mx-auto" style="font-size: 18px !important;"><b>   {{ __('language.payment') }}</b></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('Trade-licence.side-section.old-licence-js')
    @section('js')
        <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
        <script type="text/javascript">

            jQuery(function($){

                if(!ace.vars['touch']) {
                    $('.chosen-select').chosen({allow_single_deselect:true});
                    //resize the chosen on window resize

                    $(window)
                        .off('resize.chosen')
                        .on('resize.chosen', function() {
                            $('.chosen-select').each(function() {
                                var $this = $(this);
                                $this.next().css({'width': $this.parent().width()});
                            })
                        }).trigger('resize.chosen');
                    //resize chosen on sidebar collapse/expand
                    $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                        if(event_name != 'sidebar_collapsed') return;
                        $('.chosen-select').each(function() {
                            var $this = $(this);
                            $this.next().css({'width': $this.parent().width()});
                        })
                    });


                    $('#chosen-multiple-style .btn').on('click', function(e){
                        var target = $(this).find('input[type=radio]');
                        var which = parseInt(target.val());
                        if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                        else $('#form-field-select-4').removeClass('tag-input-style');
                    });
                }

            })
        </script>
    @stop

    <script>
        function financialYearSelect(){
            let year = document.getElementById('fyear').value;
            let licenses = {!! json_encode($licenses) !!};
            let license_info_select = document.getElementById('license_info');
            license_info_select.innerHTML = '<option disabled selected>--Select--</option>';
            licenses.forEach(function(license) {
                    for (let i=0; i < license.payment.length; i++) {
                        if (license.payment[i].financial_year_id == year){
                            var option = document.createElement('option');
                            option.value = license.payment[i].id;
                            option.setAttribute('data-applicant-name', license.user.name);
                            option.setAttribute('data-applicant-phone', license.user.phone);
                            option.setAttribute('data-license-fee-with-vat', license.payment[i].amount);
                            option.text = license.business_name+" ("+license.business_category.type+", "+license.payment[i].financial_year.start_year+'-'+license.payment[i].financial_year.end_year+")";
                            license_info_select.appendChild(option);
                        }
                    }
            });
        }

        function licenseInfoSelect(){
            let licenses = {!! json_encode($licenses) !!};
            let license_info = document.getElementById('license_info');
            let license_info_attributes = license_info.options[license_info.selectedIndex];
            document.getElementById('applicant_name').value = license_info_attributes.getAttribute('data-applicant-name')+" ("+license_info_attributes.getAttribute('data-applicant-phone')+")";
            document.getElementById('paid_amount').value = parseInt(license_info_attributes.getAttribute('data-license-fee-with-vat'));
        }
    </script>
@endsection
