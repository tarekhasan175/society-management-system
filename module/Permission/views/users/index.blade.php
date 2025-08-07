
@extends('layouts.master')

@section('title',' User')


@section('css')

@stop


@section('content')

    <div class="page-header">
        @if (hasPermission("users.view", $slugs))
            <a class="btn btn-xs btn-info" href="{{ route('users.create') }}" style="float: right; margin: 0 2px;"> <i class="fa fa-plus"></i> Add User </a>
        @endif
        <h1>
            <i class="fa fa-info-circle green"></i> User List
        </h1>
    </div>

    @include('partials._alert_message')

    <div class="row">
        <div class="col-xs-12">

            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
                <table id="data-table" class="table table-striped table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-corner">

                                        @if (hasPermission("users.edit", $slugs))
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        @endif

                                        @if (hasPermission("users.delete", $slugs))
                                            <button class="btn btn-sm btn-danger" title="Delete" onclick="delete_item('{{ route('users.destroy', $user->id) }}')" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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
