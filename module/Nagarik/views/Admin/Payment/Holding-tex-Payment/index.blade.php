@extends('layouts.master')

@section('title',' User')


@section('css')

@stop


@section('content')

    <div class="page-header">



        <h1>
            <i class="fa fa-info-circle green"></i>  {{ __('language.holding_payment_list') }}
        </h1>
    </div>

    @include('partials._alert_message')

    <div class="row">
        <div class="col-xs-12">

            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
                <table id="data-table" class="table table-striped table-bordered table-hover">
                    <thead style="text-align: center">
                    <tr>
                        <th style="text-align: center ; width: 3%">#</th>
                        <th style="text-align: center ; width: 14%">{{ __('language.Name_of_Occupant') }}</th>
                        <th style="text-align: center  ;width: 14%">{{ __('language.father_name') }}</th>
                        <th style="text-align: center ;width: 14%">{{ __('language.mother_name') }}</th>
                        <th style="text-align: center ;width: 14%">{{ __('language.Amount_of_land') }}</th>
                        <th style="text-align: center ;width: 14%">{{ __('language.application_time') }}</th>
{{--                        <th style="text-align: center ;width: 10%">{{ __('language.condition') }}</th>--}}


                        <th style="text-align: center ; width: 16%"></th>
                    </tr>
                    </thead>
                    @foreach($paymentLists as $holdin)

                        <tbody style="text-align: center">


                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$holdin->holdingtex->h_occupant}}</td>
                            <td>{{$holdin->holdingtex->h_father}}</td>
                            <td>{{$holdin->holdingtex->h_mother}}</td>
                            <td>{{$holdin->holdingtex->h_land_wide}}</td>
                            {{--                            <th style="align-items: center">{{ \Carbon\Carbon::parse( $holdin->created_at)->diffForHumans() }}</th>--}}
                            <th style="align-items: center ; color: #6c757d; opacity: 0.6; ">{{ \Carbon\Carbon::parse($holdin->created_at)->locale( __('language.lan') )->diffForHumans() }}</th>

                            <td class="text-center">
                                <div class="btn-group btn-corner">

                                    <a href="{{ route('holding-tex-payment.show', $holdin->id) }}"
                                       class="btn btn-sm btn-info" title="Show">
                                        <i class="fa fa-eye"></i>
                                    </a>

{{--                                    <a href="{{ route('holding-tex-payment.edit', $holdin->id) }}"--}}
{{--                                       class="btn btn-sm btn-primary" title="Show">--}}
{{--                                        <i class="fa fa-print"></i>--}}
{{--                                    </a>--}}





                                </div>
                            </td>
                        </tr>


                        </tbody>
                    @endforeach
                </table>
            </div>
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

