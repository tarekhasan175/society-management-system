@extends('layouts.master')

@section('title',' User')



@section('content')

    <div class="page-header">


        @if($HoldingData->h_apply_status == 0)
        <a class="btn btn-xs btn-info" href="{{route('admin-receive-holding-tex-apply.index')}}" style="float: right; margin: 0 2px;">
            <i class="fa fa-archive"></i> {{ __('language.go_back') }}</a>

        @else
            <a class="btn btn-xs btn-info" href="{{route('admin-receive-holding-tex-apply.create')}}" style="float: right; margin: 0 2px;">
            <i class="fa fa-archive"></i> {{ __('language.go_back') }}</a>
        @endif
        <h1>

            <i class="fa fa-info-circle green"></i> {{ __('language.holding_description') }}


        </h1>
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
                        {{$HoldingData->h_occupant}}
                    </div>
                    <hr>
                    <hr>


                    <div class="col-md-6 bolder">
                        {{ __('language.occupation') }}:
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_occupation}}
                    </div>


                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.father_name') }} :
                    </div>

                    <div class="col-md-6">
                        {{$HoldingData->h_father}}
                    </div>

                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.mother_name') }} :
                    </div>

                    <div class="col-md-6">
                        {{$HoldingData->h_mother}}
                    </div>

                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.Spouse_Name') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_depent}}
                    </div>
                    <hr>
                    <hr>
                    <div class="col-md-6 bolder">
                        {{ __('language.Relationship_with_the_applicant') }} :
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->h_depent_r}}
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
                        {{ __('language.holding_number') }}:
                    </div>
                    <div class="col-md-6">
                        {{$HoldingData->holding_number}}
                    </div>
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
                        {{optional($HoldingData->landType)->type }}
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

    <div class="row">
        <div class="col-xs-12">
            <hr>
            <div class="align-center bolder " style="font-size: 16px">
                <span> {{ __('language.Documents_displayed') }} </span>
            </div>
            <hr>

            <div class="row ">
                <div class="col-md-4 align-left">
                    {{$HoldingData->h_checkbox1_input}}
                </div>
                <div class="col-md-4 align-left">
                    {{$HoldingData->h_checkbox1_comment}}
                </div>
                <div class="col-md-4 align-center">
                    <img src="{{ asset($HoldingData->h_checkbox1_upload) }}"  alt="image"  style="height: 100px ; width: 90px">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 align-left">
                    {{$HoldingData->h_checkbox2_input}}
                </div>
                <div class="col-md-4 align-left">
                    {{$HoldingData->h_checkbox2_comment}}
                </div>
                <div class="col-md-4 align-center">
                    <img src="{{ asset($HoldingData->h_checkbox2_upload) }}"  alt="image"  style="height: 100px ; width: 90px">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 align-left">
                    {{$HoldingData->h_checkbox3_input}}
                </div>
                <div class="col-md-4 align-left">
                    {{$HoldingData->h_checkbox3_comment}}
                </div>
                <div class="col-md-4 align-center">
                    <img src="{{ asset($HoldingData->h_checkbox3_upload) }}"  alt="image"  style="height: 100px ; width: 90px">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 align-left">
                    {{$HoldingData->h_checkbox4_input}}
                </div>
                <div class="col-md-4 align-left">
                    {{$HoldingData->h_checkbox4_comment}}
                </div>
                <div class="col-md-4 align-center">
                    <img src="{{ asset($HoldingData->h_checkbox4_upload) }}"  alt="image"  style="height: 100px ; width: 90px">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 align-left">
                    {{$HoldingData->h_checkbox5_input}}
                </div>
                <div class="col-md-4 align-left">
                    {{$HoldingData->h_checkbox5_comment}}
                </div>
                <div class="col-md-4 align-center">
                    <img src="{{ asset($HoldingData->h_checkbox5_upload) }}"  alt="image"  style="height: 100px ; width: 90px">
                </div>
            </div>
            <hr>


        </div>
    </div>



    <div class="row">
        <div class="col-xs-12">
            <hr>
            <div class="align-center bolder">


                <div class="btn-group btn-corner" style="display: flex ; justify-content: center" >
                    @if($HoldingData->h_apply_status == 0)
                    <a href="{{route('admin-receive-holding-tex-apply.index')}}" class="btn btn-sm btn-info" title="Eject">
                        <i class="fa fa-eject"></i>
                    </a>

                        <form method="POST" action="{{ route('admin-receive-holding-tex-apply.update', $HoldingData->id) }}">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="btn btn-sm btn-success" title="Approve">
                                <i class="fa fa-check"></i>
                            </button>
                        </form>


                        {{--                    <a href="{{ route('admin-receive-holding-tex-apply.update', $HoldingData->id) }}" class="btn btn-sm btn-success"--}}
{{--                       title="Approve">--}}
{{--                        <i class="fa fa-check"></i>--}}
{{--                    </a>--}}
                    @else
                        <a href="{{route('admin-receive-holding-tex-apply.create')}}" class="btn btn-sm btn-info" title="Eject">
                            <i class="fa fa-eject"></i>
                        </a>

                        <a href="{{ route('admin-receive-holding-tex-apply.update', $HoldingData->id) }}" class="btn btn-sm btn-success"
                           title="cancel">
                            <i class="fa fa-print"></i>
                        </a>
                    @endif
                    <button class="btn btn-sm btn-danger" title="Delete"
                            onclick="delete_item('{{ route('admin-receive-holding-tex-apply.destroy', $HoldingData->id) }}')"
                            type="button">
                        <i class="fa fa-recycle"></i>
                    </button>

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
