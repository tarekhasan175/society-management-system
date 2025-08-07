@extends('layouts.master')

@section('title',' User')



@section('content')

    <div class="page-header">

        <h4 class="widget-title">
            <i class="fa fa-plus-circle"></i>   {{__('language.description_e_holding')}}
        </h4>
    </div>

    @include('partials._alert_message')

    <div class="row">
        <div class="col-xs-12 ">


            <div class="col-md-6">
                <div>

                    <div class="col-md-6 bolder">
                        {{ __('language.Name_of_Occupant') }}:
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_occupant ?? ''}}
                    </div>
                    <hr>
                    <hr>


                    <div class="col-md-6 bolder">
                        {{ __('language.occupation') }}:
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_occupation ?? ''}}
                    </div>


                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.father_name') }} :
                    </div>

                    <div class="col-md-6">
                        {{$HoldingData->h_father ?? ''}}
                    </div>

                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.mother_name') }} :
                    </div>

                    <div class="col-md-6">
                        {{$HoldingData->h_mother ?? ''}}
                    </div>

                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.Spouse_Name') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_depent ?? ''}}
                    </div>
                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.Relationship_with_the_applicant') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_depent_r ?? ''}}
                    </div>

                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.gender') }} :
                    </div>
                    <div class="col-md-6">
                        @if($HoldingData->h_gender == 1)
                            পুরুষ
                        @else
                            মহিলা
                        @endif
                    </div>

                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.phone_number') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_phone}}
                    </div>
                    <hr>
                    <hr>

                    <div class="col-md-6 bolder">
                        {{ __('language.Alternate_Contact_Number') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_xt_phone}}
                    </div>
                    <hr>
                    <hr>


                    <div class="col-md-6 bolder">
                        {{ __('language.e_mail_id') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_mail}}
                    </div>
                    <hr>
                    <hr>


                    <div class="col-md-6 bolder">
                        {{ __('language.Alternate_e_mail_id') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_xt_mail}}
                    </div>
                    <hr>
                    <hr>


                    <div class="col-md-6 bolder">
                        {{ __('language.address') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_address}}
                    </div>
                    <hr>
                    <hr>

                </div>
            </div>


            <div class="col-md-6">

                <div>
                    <div class="col-md-6 bolder">
                        {{ __('language.application_date') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_applydate}}
                    </div>
                    <hr>
                    <hr>

                    <div class="col-md-6 bolder">
                        {{ __('language.nid_number') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_nid}}
                    </div>
                    <hr>
                    <hr>

                    <div class="col-md-6 bolder">
                        {{ __('language.other_nid_number') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_xt_nid}}
                    </div>
                    <hr>
                    <hr>


                    <div class="col-md-6 bolder">
                        {{ __('language.tin_number') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_tin}}

                    </div>

                    <hr>
                    <hr>


                    <div class="col-md-6 bolder">
                        {{ __('language.area') }} :
                    </div>
                    <div class="col-md-6">
                        {{optional($HoldingData->cityarea)->name}}
                    </div>
                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.word') }} :
                    </div>
                    <div class="col-md-6">
                        {{optional($HoldingData->wordareya)->name}}
                    </div>
                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.sector') }} :
                    </div>
                    <div class="col-md-6">
                        {{optional($HoldingData->nagoriksector)->name}}
                    </div>
                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.block') }} :
                    </div>
                    <div class="col-md-6">
                        {{optional($HoldingData->nagorikbloc)->name}}
                    </div>
                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.road') }} :
                    </div>
                    <div class="col-md-6">
                        {{optional($HoldingData->nagorikroad)->name}}

                    </div>
                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.Amount_of_land') }}:
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_land_wide}}
                    </div>
                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.land_user_type') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_land_use_type}}
                    </div>
                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.all_aria') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_land_square}}
                    </div>


                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.small_description') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_description}}
                    </div>
                </div>
            </div>


        </div>
    </div>




    <div class="col-md-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="row text-center" style="margin-top: 15px;">
                    <div class="col-sm-12">
                        <div>
                            <table cellspacing="0" cellpadding="4" rules="all" border="1"
                                   id="ContentPlaceHolder1_gvResult"
                                   style="border-style:None;width:100%;border-collapse:collapse;">
                                <tr class="header">
                                    <th align="center" scope="col">{{__('language.quarter')}}</th>
                                    <th align="center" scope="col">{{__('language.Holding_tex')}}</th>
                                    <th align="center" scope="col">{{__('language.Dirt_rats')}}</th>
                                    <th align="center" scope="col">{{__('language.road_light')}}</th>
                                    <th align="center" scope="col">{{__('language.all_fee')}}</th>
                                    <th align="center" scope="col">{{__('language.re_vat')}}</th>
                                    <th align="center" scope="col">{{__('language.penalty')}}</th>
                                    <th align="center" scope="col">{{__('language.interest')}}</th>
                                    <th align="center" scope="col"> {{__('language.total_fees')}}</th>
                                    <th align="center" scope="col">{{__('language.Fee_received')}}</th>
                                    <th align="center" scope="col"> {{__('language.Total_due')}}</th>
                                </tr>
                                @if($HoldingData->paymentModel->status == 1)
                                    <tr class="rows">
                                        <td align="center">


                                            <span id="ContentPlaceHolder1_gvResult_lblQuarter_0"> {{__('language.received')}}</span>
                                        </td>
                                        <td align="center">
                                                                        <span
                                                                            id="ContentPlaceHolder1_gvResult_lblHtax_0">{{$HoldingData->landType->holdingTexRate->holding_fee}}</span>
                                        </td>
                                        <td align="center">
                                                                        <span
                                                                            id="ContentPlaceHolder1_gvResult_lblcltax_0">0.00</span>
                                        </td>
                                        <td align="center">
                                                                        <span
                                                                            id="ContentPlaceHolder1_gvResult_lblcntax_0">0.00</span>
                                        </td>
                                        <td align="center">
                                            <span id="ContentPlaceHolder1_gvResult_lbltotaltax_0">{{$HoldingData->landType->holdingTexRate->holding_fee }}</span>
                                        </td>
                                        <td align="center">
                                                                        <span
                                                                            id="ContentPlaceHolder1_gvResult_lblRebate_0">{{($HoldingData->landType->holdingTexRate->holding_fee*(companyInfo()->company_details->vat/100))}}</span>
                                        </td>
                                        <td align="center">
                                            <span id="ContentPlaceHolder1_gvResult_lblPenalty_0">0.00</span>
                                        </td>
                                        <td align="center">
                                            <span id="ContentPlaceHolder1_gvResult_lblInterest_0">0.00</span>
                                        </td>
                                        <td align="center">
                                            <span id="ContentPlaceHolder1_gvResult_lblPayable_0">{{$HoldingData->landType->holdingTexRate->holding_fee + ($HoldingData->landType->holdingTexRate->holding_fee*(companyInfo()->company_details->vat/100))}}</span>
                                        </td>
                                        <td align="center">
                                                                        <span
                                                                            id="ContentPlaceHolder1_gvResult_lblPayablePaid_0">{{$HoldingData->landType->holdingTexRate->holding_fee + ($HoldingData->landType->holdingTexRate->holding_fee*(companyInfo()->company_details->vat/100))}}</span>
                                        </td>
                                        <td align="center">
                                            <span id="ContentPlaceHolder1_gvResult_lblPayableDue_0">0.00</span>
                                        </td>
                                    </tr>
                                @else
                                    <tr class="rows">
                                        <td align="center">


                                            <span id="ContentPlaceHolder1_gvResult_lblQuarter_0"> {{__('language.due')}}</span>
                                        </td>
                                        <td align="center">
                                                                        <span
                                                                            id="ContentPlaceHolder1_gvResult_lblHtax_0">{{$HoldingData->landType->holdingTexRate->holding_fee}}</span>
                                        </td>
                                        <td align="center">
                                                                        <span
                                                                            id="ContentPlaceHolder1_gvResult_lblcltax_0">0.00</span>
                                        </td>
                                        <td align="center">
                                                                        <span
                                                                            id="ContentPlaceHolder1_gvResult_lblcntax_0">0.00</span>
                                        </td>
                                        <td align="center">
                                            <span id="ContentPlaceHolder1_gvResult_lbltotaltax_0">{{$HoldingData->landType->holdingTexRate->holding_fee }}</span>
                                        </td>
                                        <td align="center">
                                                                        <span
                                                                            id="ContentPlaceHolder1_gvResult_lblRebate_0">{{($HoldingData->landType->holdingTexRate->holding_fee*(companyInfo()->company_details->vat/100))}}</span>
                                        </td>
                                        <td align="center">
                                            <span id="ContentPlaceHolder1_gvResult_lblPenalty_0">0.00</span>
                                        </td>
                                        <td align="center">
                                            <span id="ContentPlaceHolder1_gvResult_lblInterest_0">0.00</span>
                                        </td>
                                        <td align="center">
                                            <span id="ContentPlaceHolder1_gvResult_lblPayable_0">{{$HoldingData->landType->holdingTexRate->holding_fee + ($HoldingData->landType->holdingTexRate->holding_fee*(companyInfo()->company_details->vat/100))}}</span>
                                        </td>
                                        <td align="center">
                                                                        <span
                                                                            id="ContentPlaceHolder1_gvResult_lblPayablePaid_0">0.00</span>
                                        </td>
                                        <td align="center">
                                            <span id="ContentPlaceHolder1_gvResult_lblPayableDue_0">{{$HoldingData->landType->holdingTexRate->holding_fee + ($HoldingData->landType->holdingTexRate->holding_fee*(companyInfo()->company_details->vat/100))}}</span>
                                        </td>
                                    </tr>
                                @endif

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-xs-12">
            <hr>
            <div class="align-center bolder">


                <div class="btn-group btn-corner">

                    <a href="{{route('e-holding-dashboard')}}" class="btn btn-sm btn-info" title="Edit">
                        <i class="fa fa-eject"></i>
                    </a>

                    {{--                    <a href="{{ route('holding-taxApply.edit', $HoldingData->id) }}" class="btn btn-sm btn-success"--}}
                    {{--                       title="Edit">--}}
                    {{--                        <i class="fa fa-pencil-square-o"></i>--}}
                    {{--                    </a>--}}

                    {{--                    <button class="btn btn-sm btn-danger" title="Delete"--}}
                    {{--                            onclick="delete_item('{{ route('holding-taxApply.destroy', $HoldingData->id) }}')"--}}
                    {{--                            type="button">--}}
                    {{--                        <i class="fa fa-trash"></i>--}}
                    {{--                    </button>--}}

                </div>

            </div>
            <hr>

        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>




    <script src="{{ asset('assets/custom_js/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/custom_js/confirm_delete_dialog.js') }}"></script>


    <!-- inline scripts related to this page -->
    <script type="text/javascript">

        function delete_check(id) {
            Swal.fire({
                title: 'Are you sure ?',
                html: "<b>You want to delete permanently !</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                width: 400,
            }).then((result) => {
                if (result.value) {
                    $('#deleteCheck_' + id).submit();
                }
            })

        }

    </script>

@stop
























{{--@extends('layouts.master')--}}

{{--@section('title','Add New User')--}}


{{--@section('css')--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>--}}
{{--@stop--}}


{{--@section('content')--}}

{{--    <div class="row">--}}
{{--        <div class="col-sm-12">--}}
{{--            <div class="widget-box">--}}
{{--                <div class="widget-header">--}}
{{--                    <h4 class="widget-title">--}}
{{--                        <i class="fa fa-plus-circle"></i>ই-হোল্ডিং এর বিবরণ--}}
{{--                    </h4>--}}
{{--                    <span class="widget-toolbar">--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--                <div class="widget-body">--}}
{{--                    <div class="widget-main no-padding">--}}

{{--                        <div style="margin: 20px;">--}}
{{--                            @include('partials._alert_message')--}}
{{--                        </div>--}}

{{--                        <div class="row" style="padding: 10px">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblholdingtaxno">ই-হোল্ডিং নম্বর :</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtHoldingTaxNo" type="text"--}}
{{--                                                       id="txtHoldingTaxNo" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       required="required" readonly="readonly"/>--}}
{{--                                            </div>--}}

{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_Label1">এসেসি/দখলকারের নাম :</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtAppName" type="text"--}}
{{--                                                       id="txtAppName" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_Label2">বাড়ির নম্বর :</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtHouseNo" type="text"--}}
{{--                                                       id="txtHouseNo" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       required="required" readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_Label3">ঠিকানা :</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-3 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtAddress" type="text"--}}
{{--                                                       id="txtAddress" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_Label4"> মোবাইল নম্বর :</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtMobile1" type="text"--}}
{{--                                                       id="txtMobile1" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       required="required" readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_Label5">বিকল্প যোগাযোগের নং :</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-3 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtContact2" type="text"--}}
{{--                                                       id="txtContact2" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_Label6"> ই-মেইল আই ডি :</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtEmail1" type="text"--}}
{{--                                                       id="txtEmail1" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       required="required" readonly="readonly"--}}
{{--                                                       style="font-family: 'Times New Roman', Georgia, Serif;"/>--}}
{{--                                            </div>--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_Label7">বিকল্প ই-মেইল আইডি :</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-3 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtEmail2" type="text"--}}
{{--                                                       id="txtEmail2" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblZone">অঞ্চল</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtZone" type="text"--}}
{{--                                                       readonly="readonly" id="txtZone"--}}
{{--                                                       class="form-control col-md-7 col-xs-12" required="required"/>--}}
{{--                                            </div>--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblWard">ওয়ার্ড</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-3 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtWard" type="text"--}}
{{--                                                       readonly="readonly" id="txtWard"--}}
{{--                                                       class="form-control col-md-7 col-xs-12"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblSector">সেক্টর/সেকশন</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtSector" type="text"--}}
{{--                                                       readonly="readonly" id="txtSector"--}}
{{--                                                       class="form-control col-md-7 col-xs-12" required="required"/>--}}
{{--                                            </div>--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblArea">এরিয়া/ব্লক</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-3 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtArea" type="text"--}}
{{--                                                       readonly="readonly" id="txtArea"--}}
{{--                                                       class="form-control col-md-7 col-xs-12"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_Label8">রোড</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtholdingward" type="text"--}}
{{--                                                       id="txtholdingward" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       required="required" readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_Label9">মোট পরিমান(বর্গফুট)</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-3 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtareaoftheland" type="text"--}}
{{--                                                       id="txtareaoftheland" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblusedbyowner">মালিক দ্বারা ব্যবহৃত অংশ (বর্গফুট)</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtusedbyowner" type="text"--}}
{{--                                                       id="txtusedbyowner" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblusedbytenant">ভাড়াটিয়া দ্বারা ব্যবহৃত অংশ(বর্গফুট)</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-3 col-xs-12">--}}

{{--                                                <input name="ctl00$ContentPlaceHolder1$txtusedbytenant" type="text"--}}
{{--                                                       id="txtusedbytenant" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblmonthlyrental">মাসিক ভাড়া</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                                                <input name="ctl00$ContentPlaceHolder1$txtmonthlyrental" type="text"--}}
{{--                                                       id="txtmonthlyrental" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span--}}
{{--                                                    id="ContentPlaceHolder1_lblannualvaluation">বার্ষিক মূল্যায়ন</span>--}}
{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-3 col-xs-12">--}}
{{--                                                <input name="ctl00$ContentPlaceHolder1$txtannualvaluation" type="text"--}}
{{--                                                       id="txtannualvaluation" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblhold_tax_annual_tax">বার্ষিক কর</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                                                <input name="ctl00$ContentPlaceHolder1$txtlblhold_tax_annual_tax"--}}
{{--                                                       type="text" id="txtlblhold_tax_annual_tax"--}}
{{--                                                       class="form-control col-md-7 col-xs-12" readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblhold_tax_house_tax">হোল্ডিং কর:</span>--}}
{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-3 col-xs-12">--}}
{{--                                                <input name="ctl00$ContentPlaceHolder1$txthousetax" type="text"--}}
{{--                                                       id="txthousetax" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblhold_tax_cleaning_tax">ময়লা ও নিষ্কাশন রেইট:</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                                                <input name="ctl00$ContentPlaceHolder1$txthold_tax_cleaning_tax"--}}
{{--                                                       type="text" id="txthold_tax_cleaning_tax"--}}
{{--                                                       class="form-control col-md-7 col-xs-12" readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_lblelectrictax">সড়ক বাতি রেইট:</span>--}}
{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-3 col-xs-12">--}}
{{--                                                <input name="ctl00$ContentPlaceHolder1$txtelectrictax" type="text"--}}
{{--                                                       id="txtelectrictax" class="form-control col-md-7 col-xs-12"--}}
{{--                                                       readonly="readonly"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="x_content">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">--}}
{{--                                                <span id="ContentPlaceHolder1_Label10">ফ্ল্যাট নং:</span>--}}

{{--                                            </label>--}}
{{--                                            <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                                                <input name="ctl00$ContentPlaceHolder1$txtFlat" type="text" id="txtFlat"--}}
{{--                                                       class="form-control col-md-7 col-xs-12" readonly="readonly"/>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <div class="row">--}}
{{--        <div class="col-sm-12">--}}
{{--            <div class="widget-box">--}}
{{--                <div class="widget-header">--}}
{{--                    <h4 class="widget-title">--}}
{{--                        <i class="fa fa-plus-circle"></i>ই-হোল্ডিং ফী--}}
{{--                    </h4>--}}
{{--                    <span class="widget-toolbar">--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--                <div class="widget-body">--}}
{{--                    <div class="widget-main no-padding">--}}

{{--                        <div style="margin: 20px;">--}}
{{--                            @include('partials._alert_message')--}}
{{--                        </div>--}}

{{--                        <div class="row" style="padding: 10px">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="x_panel">--}}

{{--                                    <div class="x_content">--}}
{{--                                        <div class="row text-center" style="margin-top: 15px;">--}}
{{--                                            <div class="col-sm-12">--}}
{{--                                                <div>--}}
{{--                                                    <table cellspacing="0" cellpadding="4" rules="all" border="1"--}}
{{--                                                           id="ContentPlaceHolder1_gvResult"--}}
{{--                                                           style="border-style:None;width:100%;border-collapse:collapse;">--}}
{{--                                                        <tr class="header">--}}
{{--                                                            <th align="center" scope="col">কোয়ার্টার</th>--}}
{{--                                                            <th align="center" scope="col">হোল্ডিং কর</th>--}}
{{--                                                            <th align="center" scope="col">ময়লা ও নিষ্কাশন রেইট</th>--}}
{{--                                                            <th align="center" scope="col">সড়ক বাতি রেইট</th>--}}
{{--                                                            <th align="center" scope="col">মোট ফী</th>--}}
{{--                                                            <th align="center" scope="col">রিবেট</th>--}}
{{--                                                            <th align="center" scope="col">জরিমানা</th>--}}
{{--                                                            <th align="center" scope="col">সুদ</th>--}}
{{--                                                            <th align="center" scope="col">সর্বমোট ফী</th>--}}
{{--                                                            <th align="center" scope="col">প্রাপ্ত ফী</th>--}}
{{--                                                            <th align="center" scope="col">মোট বকেয়া</th>--}}
{{--                                                        </tr>--}}
{{--                                                        <tr class="rows">--}}
{{--                                                            <td align="center">--}}


{{--                                                                <span id="ContentPlaceHolder1_gvResult_lblQuarter_0">বকেয়া</span>--}}
{{--                                                            </td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span--}}
{{--                                                                    id="ContentPlaceHolder1_gvResult_lblHtax_0">0.00</span>--}}
{{--                                                            </td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span--}}
{{--                                                                    id="ContentPlaceHolder1_gvResult_lblcltax_0">0.00</span>--}}
{{--                                                            </td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span--}}
{{--                                                                    id="ContentPlaceHolder1_gvResult_lblcntax_0">0.00</span>--}}
{{--                                                            </td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span id="ContentPlaceHolder1_gvResult_lbltotaltax_0">0.00</span>--}}
{{--                                                            </td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span--}}
{{--                                                                    id="ContentPlaceHolder1_gvResult_lblRebate_0">0.00</span>--}}
{{--                                                            </td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span id="ContentPlaceHolder1_gvResult_lblPenalty_0">0.00</span>--}}
{{--                                                            </td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span id="ContentPlaceHolder1_gvResult_lblInterest_0">0.00</span>--}}
{{--                                                            </td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span id="ContentPlaceHolder1_gvResult_lblPayable_0">0.00</span>--}}
{{--                                                            </td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span--}}
{{--                                                                    id="ContentPlaceHolder1_gvResult_lblPayablePaid_0">0.00</span>--}}
{{--                                                            </td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span id="ContentPlaceHolder1_gvResult_lblPayableDue_0">0.00</span>--}}
{{--                                                            </td>--}}
{{--                                                        </tr>--}}
{{--                                                    </table>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <div class="row">--}}

{{--        <div class="col-sm-12">--}}
{{--            <div class="widget-box">--}}

{{--                <div class="widget-header">--}}
{{--                    <h4 class="widget-title">--}}
{{--                        <i class="fa fa-plus-circle"></i> ই নোটিশ--}}
{{--                    </h4>--}}
{{--                    <span class="widget-toolbar">--}}
{{--                    </span>--}}
{{--                </div>--}}

{{--                <div class="widget-body">--}}
{{--                    <div class="widget-main no-padding">--}}

{{--                        <div style="margin: 20px;">--}}
{{--                            @include('partials._alert_message')--}}
{{--                        </div>--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-sm-8 col-sm-offset-1">--}}

{{--                                --}}{{--                                main content--}}


{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--@endsection--}}






