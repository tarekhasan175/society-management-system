@extends('layouts.master')

@section('title',' User')


@section('css')

@stop


@section('content')

    <div class="page-header">

        <h4 class="widget-title">
            <i class="fa fa-plus-circle"></i>   {{__('language.description_e_holding')}}
        </h4>
    </div>

    @include('partials._alert_message')

    <div class="row">
        <div class="col-xs-12">

            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
                <table id="data-table" class="table table-striped table-bordered table-hover">
                    <thead style="text-align: center">
                    <tr>
                        <th>#</th>
                        <th style="text-align: center">{{ __('language.Name_of_Occupant') }}</th>
                        <th style="text-align: center">{{ __('language.father_name') }}</th>
                        <th style="text-align: center" width="50%">{{ __('language.address') }}</th>
                        <th style="text-align: center" >{{ __('language.Amount_of_land') }}</th>


                        <th style="text-align: center"></th>
                    </tr>
                    </thead>
                    @foreach($holdingTex as $holdin)

                        <tbody style="text-align: center ; " >


                        <tr style="background-color:   {{$holdin->paymentModel->status == 1 ? 'lightgreen' : 'indianred'  }}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$holdin->h_occupant}}</td>
                            <td>{{$holdin->h_father}}</td>
                            <td>

                                {{optional($holdin->cityarea)->name}} ,{{optional($holdin->wordareya)->name}},
                                {{optional($holdin->nagoriksector)->name}} ,{{optional($holdin->nagorikbloc)->name}},
                                {{optional($holdin->nagorikroad)->name}} , {{$holdin->holding_number}}


                            </td>
                            <td>{{$holdin->h_land_wide}}</td>

                            <td class="text-center">
                                <div class="btn-group btn-corner">

                                    <a href="{{ route('e-holding-show', $holdin->id) }}"
                                       class="btn btn-sm btn-info" title="Show">
                                        <i class="fa fa-eye"></i>
                                    </a>

{{--                                    <a href="{{ route('holding-taxApply.edit', $holdin->id) }}"--}}
{{--                                       class="btn btn-sm btn-success" title="Edit">--}}
{{--                                        <i class="fa fa-pencil-square-o"></i>--}}
{{--                                    </a>--}}

{{--                                    <button class="btn btn-sm btn-danger" title="Delete"--}}
{{--                                            onclick="delete_item('{{ route('holding-taxApply.destroy', $holdin->id) }}')"--}}
{{--                                            type="button">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </button>--}}

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

