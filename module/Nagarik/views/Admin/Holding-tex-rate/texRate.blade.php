
@extends('layouts.master')

@section('title',' User')


@section('css')

@stop


@section('content')

    <div class="page-header">

        <a class="btn btn-xs btn-info" href="{{route('holding-rates.create')}}" style="float: right; margin: 0 2px;"> <i class="fa fa-plus"></i>      {{ __('language.add_new_button') }}</a>

        <h1>
            <i class="fa fa-info-circle green"></i> {{ __('language.Holding-Tax') }}
        </h1>
    </div>

    @include('partials._alert_message')

    <div class="row">
        <div class="col-xs-12">

            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
                <table id="data-table" class="table table-striped table-bordered table-hover" >
                    <thead style="text-align: center">
                    <tr>
                        <th>#</th>
                        <th style="text-align: center">  {{ __('language.area') }}</th>
                        <th style="text-align: center"> {{ __('language.holding_description') }}</th>
                        <th style="text-align: center"> {{ __('language.Holding_tex') }}</th>
                        <th style="text-align: center"></th>
                    </tr>
                    </thead>
                    @foreach($holdingTexRate as $TexRate)


                        <tbody style="text-align: center">



                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{optional($TexRate->cityarea)->name}} </td>
                            <td>{{optional($TexRate->nagoriklandtype)->type}}</td>
                            <td>{{$TexRate->holding_fee}}</td>
                            <td class="text-center">
                                <div class="btn-group btn-corner">

                                    <a href="{{ route('holding-rates.edit', $TexRate->id) }}" class="btn btn-sm btn-success" title="Edit">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>

                                    <button class="btn btn-sm btn-danger" title="Delete" onclick="delete_item('{{ route('holding-rates.destroy', $TexRate->id) }}')" type="button">
                                        <i class="fa fa-trash"></i>
                                    </button>

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

        function delete_check(id)
        {
            Swal.fire({
                title: 'Are you sure ?',
                html: "<b>You want to delete permanently !</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                width:400,
            }).then((result) =>{
                if(result.value){
                    $('#deleteCheck_'+id).submit();
                }
            })

        }

    </script>

@stop
