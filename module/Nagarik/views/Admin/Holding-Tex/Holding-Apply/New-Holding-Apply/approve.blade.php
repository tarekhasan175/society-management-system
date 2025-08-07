@extends('layouts.master')

@section('title',' User')


@section('css')

@stop


@section('content')



    <div class="page-header">



        <h1>
            <i class="fa fa-info-circle green"></i>  {{ __('language.new_holding') }}
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
                        <th style="text-align: center ;width: 10%">{{ __('language.condition') }}</th>


                        <th style="text-align: center ; width: 16%"></th>
                    </tr>
                    </thead>
                    @foreach($holdingTex as $holdin)

                        <tbody style="text-align: center">


                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$holdin->h_occupant}}</td>
                            <td>{{$holdin->h_father}}</td>
                            <td>{{$holdin->h_mother}}</td>
                            <td>{{$holdin->h_land_wide}}</td>
                            {{--                            <th style="align-items: center">{{ \Carbon\Carbon::parse( $holdin->created_at)->diffForHumans() }}</th>--}}
                            <th style="align-items: center ; color: #6c757d; opacity: 0.6; ">{{ \Carbon\Carbon::parse($holdin->created_at)->locale( __('language.lan') )->diffForHumans() }}</th>
                            <td>
                              <span style=" background-color: {{ $holdin->h_apply_status == 0 ? '#FF0000' : '#A069C3' }}; color: {{ $holdin->h_apply_status == 0 ? '#000000' : '#FFFFFF' }}; border-radius: 8px; font-size: 15px;">
                               &nbsp;{{ $holdin->h_apply_status == 0 ? __('language.unauthorized') : __('language.authorized')  }}&nbsp;
                              </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-corner">

                                    <a href="{{ route('admin-receive-holding-tex-apply.show', $holdin->id) }}"
                                       class="btn btn-sm btn-info" title="Show">
                                        <i class="fa fa-eye"></i>
                                    </a>




                                    @if($holdin->h_apply_status == 0)
                                        <a href="{{ route('holding-taxApply.edit', $holdin->id) }}"
                                           class="btn btn-sm btn-success" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button class="btn btn-sm btn-danger" title="Delete"
                                                onclick="delete_item('{{ route('holding-taxApply.destroy', $holdin->id) }}')"
                                                type="button">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    @elseif($holdin->paymentModel->status == 1)
                                        <a href="{{ route('holding-tex-payment.show', $holdin->paymentModel->id) }}" class="btn btn-sm btn-success"
                                           title="cancel">
                                            <i class="fa fa-print"></i>
                                        </a>

                                    @endif


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
