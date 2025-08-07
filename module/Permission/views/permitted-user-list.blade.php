

@extends('layouts.master')

@section('title','Permitted User List')




@section('content')

    <div class="page-header">

        <h1>
            <i class="fa fa-list"></i> Permitted User List
        </h1>
    </div>

    @include('partials._alert_message')

    <div class="row">
        <div class="col-md-12" style="margin-left:auto !important; margin-right:auto !important">

            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
                <table id="data-table" class="table table-striped table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            @if(hasAnyPermission(["permission.accesses.edit", "permission.accesses.delete", "change.employees.password"], $slugs))
                                <th class="text-center">Action</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ optional($user->company)->name }}</td>

                                @if(hasPermission("permission.accesses.edit", $slugs) || hasPermission("permission.accesses.delete", $slugs) || hasPermission("change.employees.password", $slugs))
                                    <td class="text-center" style="width: 120px">
                                        <div class="btn-group btn-corner">
                                            @if(hasPermission("change.employees.password", $slugs))
                                                <a href="{{ route('admin.edit.password', $user->id) }}" class="btn btn-xs btn-info pull-center" title="Change Password">
                                                    <i class="fa fa-lock"></i>
                                                </a>
                                            @endif

                                            @if($user->status == 2)
                                                <a href="{{ route('user.active.deactive',[$user->id, 1]) }}" class="btn btn-xs btn-warning pull-center" title="Active">
                                                    <i class="fa fa-thumbs-o-up"></i>
                                                </a>
                                            @endif

                                            @if($user->status == 1)
                                                <a href="{{ route('user.active.deactive',[$user->id, 2]) }}" class="btn btn-xs btn-primary pull-center" title="De-active">
                                                    <i class="fa fa-thumbs-o-down"></i>
                                                </a>
                                            @endif

                                            @if(hasPermission("permission.accesses.edit", $slugs))
                                                <a href="{{ route('permission-access.create') }}?existing_user_id={{ $user->id }}&is_edit=1" class="btn btn-xs btn-success pull-center" title="Edit">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                            @endif

                                            @if(hasPermission("permission.accesses.delete", $slugs))
                                                <button type="button" onclick="delete_check({{ $user->id }})" class="btn btn-xs btn-danger" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endif
                                        </div>


                                        <form action="{{ route('permitted.user.delete', $user->id)}}" id="deleteCheck_{{ $user->id }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                    </td>
                                @endif
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

    
    
    <script src="{{asset('assets/custom_js/custom-datatable.js')}}"></script>



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
