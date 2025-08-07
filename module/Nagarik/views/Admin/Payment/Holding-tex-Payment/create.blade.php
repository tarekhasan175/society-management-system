@extends('layouts.master')

@section('title','Add New User')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/payment-form.css') }}"/>
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
    <form action="{{ route('holding-tex-payment.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-container">
            <div class="row form-page active">
                <div class="col-sm-12">
                    <div class="widget-box">

                        <div class="widget-header">
                            <h4 class="widget-title">
                                <i class="fa fa-plus-circle"></i>
                              {{ __('language.payment_hl_accept') }}
                            </h4>
                            <span class="widget-toolbar">
                        <a href="{{ route('holding-tex-payment.index') }}">
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

                                                        {{ __('language.holding_payment_info') }}
                                                    </span>
                                                </div>
                                                <form>

                                                    <div class="row row-1">
                                                        <div class="col-2"> {{ __('language.Name_of_Occupant') }}</div>
                                                        <div class="col-7">
                                                            <select name="name" id="name"
                                                                    class="form-control" onchange="applicantName()" required data-error-msg="Please select a Name" >
                                                                <option disabled selected>--{{ __('language.select') }}--</option>
                                                                @foreach($HoldingWoners as $HoldingWoner)
                                                                    <option value="{{ $HoldingWoner->id }}">{{ optional($HoldingWoner->user->details)->full_name }}({{ optional($HoldingWoner->user->details)->phone }})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-3 d-flex justify-content-center" style="height: 10px">

                                                        </div>
                                                    </div>
                                                    <div class="row row-1">
                                                        <div class="col-2">  {{ __('language.holding_address') }} </div>
                                                        <div class="col-7">
                                                            <select name="address_info" id="address_info" onchange="applicantAddress()" class="form-control" required data-error-msg="Please select an Address">
                                                                <option disabled selected>--{{ __('language.select') }}--</option>
                                                                <!-- Add your options here -->
                                                            </select>

                                                            <input type="hidden" name="city_area_id" id="city_area_id" value="">

                                                        </div>
                                                        <div class="col-3 d-flex justify-content-center" style="height: 10px">

                                                        </div>
                                                    </div>
                                                    <div class="row row-1">
                                                        <div class="col-2">    {{ __('language.holding_fee') }} <span style="font-size: 10px !important; color: red;">({{ __('language.include') }}  {{ companyInfo()->company_details->vat }}% {{ __('language.vat') }} )</span> </div>
                                                        <div class="col-7">
                                                            <input name="paid_amount" type="text" id="paid_amount"
                                                                   class="form-control col-md-7 col-xs-12"
                                                                   ReadOnly="true" required/>
                                                        </div>
                                                        <div class="col-3 d-flex justify-content-center" style="height: 10px">

                                                        </div>
                                                    </div>

                                                    <div class="row row-1">
                                                        <div class="col-2">    {{ __('language.Account') }}</div>
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


{{--                                                    <div class="row row-1">--}}
{{--                                                        <div class="col-2"> {{ __('language.paid_amount') }}  </div>--}}
{{--                                                        <div class="col-7">--}}
{{--                                                            <input name="paid_amount" type="text" id="paid_amount"--}}
{{--                                                                   class="form-control col-md-7 col-xs-12"--}}
{{--                                                                   required/>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-3 d-flex justify-content-center" style="height: 10px">--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <button type="submit" class="payment-btn d-flex mx-auto" style="font-size: 18px !important;"><b>    {{ __('language.payment') }}</b></button>
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

    <script>

        function applicantName(){
            $name = document.getElementById('name').value;
            let licenses = {!! json_encode($HoldingWoners) !!};
            console.log(licenses)
            let license_info_select = document.getElementById('address_info');
            license_info_select.innerHTML = '<option disabled selected>--Select--</option>';
            licenses.forEach(function(license) {
                var option = document.createElement('option');
                option.value = license.id;
                option.setAttribute('data-land-use-type', license.land_type.holding_tex_rate.holding_fee);
                option.text = license.holding_number+", "+license.cityarea.name+", "+license.wordareya.name+", "+license.nagoriksector.name+", "+license.nagorikbloc.name;
                license_info_select.appendChild(option);
            });
        }

        function applicantAddress(){
            let license_info = document.getElementById('address_info');
            let license_info_attributes = license_info.options[license_info.selectedIndex];
            document.getElementById('paid_amount').value = parseInt(license_info_attributes.getAttribute('data-land-use-type'))+(parseInt(license_info_attributes.getAttribute('data-land-use-type')) * {{ companyInfo()->company_details->vat/100 }});
        }


    </script>
@endsection
