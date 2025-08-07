@extends('layouts.master')

@section('title','User Role/Permission')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

<style>

	.panel-group .panel {
		border-radius: 5px;
		border-color: #EEEEEE;
        padding:0;
	}

	.panel-default > .panel-heading {
        color: #010101;
        background-color: #f2f2f2;
		border-color: ##EEEEEE;
	}

	.panel-title {
		font-size: 14px;
	}

	.panel-title > a {
		display: block;
		padding: 2px;
		text-decoration: none;
	}

	.short-full {
		float: right;
        color: #010101;
	}
</style>
@stop


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="widget-box">
                <div class="widget-header" style="background:#DFE2CD">


                    <h4 class="widget-title" style="font-size:20px !important; color:#41B883"> User Role/Permission </h4>

                    <span class="widget-toolbar">
                        <a href="{{ route('permission-access.create') }}">
                            <i class="ace-icon fa fa-list-alt"></i> Clear
                        </a>
                    </span>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <form class="form-horizontal" action="{{ route('permission-access.store') }}" method="POST" role="form">
                            @csrf

                            <!-- User info -->
                            <div class="row">


                                @include('partials._alert_message')
                                <br>

                                @if(request('is_edit') == '')
                                    <div class="col-md-4 pull-right" style="height: 40px;">
                                        <div class="input-group" style="width:100%">
                                            <select class="chosen-select form-control existing_user_id" name="existing_user_id">
                                                <option value="">- select -</option>

                                                @foreach ($existing_users as $key => $user)
                                                    @if (isset($existingUser))
                                                        <option value="{{ $user->id }}" {{ $existingUser->id == $user->id ? 'selected' : '' }}>{{ $user->name }} -> {{ $user->email }}</option>
                                                    @else
                                                        <option value="{{ $user->id }}" {{ request('existing_user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }} -> {{ $user->email }}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                            <span class="input-group-btn">
                                                <a href="" class="btn btn-default btn-sm load-user" type="button"> Load Permissions </a>
                                            </span>
                                        </div>
                                    </div>
                                @endif


                            </div>


                            <!-- User info -->
                            <div class="row">


                                @if(request('is_edit') == '')
                                    <div class="col-md-4" style="height: 40px;">
                                        <div class="input-group" style="width:100%">
                                            <label class="input-group-addon" style="width:130px; text-align:left"> User </label>
                                            <select class="chosen-select form-control" id="select-new-user-id" onchange="loadUserInfo(this)" name="user_id">
                                                <option value=""> select </option>

                                                @foreach ($new_users as $id => $user)
                                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}
                                                            data-name="{{ $user->name }}"
                                                            data-email="{{ $user->email }}"
                                                            data-company="{{ optional($user->company)->name }}"
                                                            >
                                                            {{ $user->name }} -> {{ $user->email }}
                                                        </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> 
                            
                                @endif


                                <input type="hidden" class="company_id" name="company_id">

                                <div class="col-md-4" style="height: 40px;">
                                    <div class="input-group" style="width:100%">
                                        <label class="input-group-addon" style="width:130px; text-align:left"> User Name </label>
                                        @if(request('is_edit') == '')
                                            <input type="text" name="user_name"  value="{{ old('user_name') }}"  class="form-control user_name" readonly  />
                                        @else 
                                            <input type="hidden" name="user_id" value="{{ $existingUser->id }}">
                                            <input type="text" name="user_name"  value="{{ old('user_name', $existingUser->name) }}"  class="form-control user_name" readonly  />
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4" style="height: 40px;">
                                    <div class="input-group" style="width:100%">
                                        <label class="input-group-addon" style="width:130px; text-align:left"> Email </label>
                                        @if(request('is_edit') == '')
                                            <input type="text" class="form-control email" name="email" value="{{ old('email') }}" placeholder="User Email"  />
                                        @else 
                                            <input type="text" name="email"  value="{{ old('email', $existingUser->email) }}"  class="form-control email" readonly  />
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4" style="height: 40px;">
                                    <div class="input-group" style="width:100%">
                                        <label class="input-group-addon" style="width:130px; text-align:left"> Company </label>

                                        @if(request('is_edit') == '')
                                            <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control company-name" readonly />
                                        @else 
                                            <input type="text" name="company_name" value="{{ old('company_name', optional($existingUser->company)->name) }}" class="form-control company-name" readonly />
                                        @endif
                                    </div>
                                </div>

                            </div>



                            <!-- Order Type -->
                            @include('access.includes.order')
                            


                            <!-- Company -->
                            @include('access.includes.company')



                            <!-- Department -->
                            @include('access.includes.department')
                            


                            <!-- Designation -->
                            @include('access.includes.designation')




                            <!-- Buyer -->
                            @include('access.includes.buyer')


                            <!-- access control -->
                            @if ($modules->count() > 0)
                                <div class="well text-center" style="margin-top:30px; margin-left:auto; margin-right:auto; font-size:20px; padding:10px; font-weight:bold">Access Control</div>
                            @endif




                            <!-- menus -->
                            @include('access.includes.menu')
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <input type="hidden" id="csrf" value="{{ csrf_token() }}">

@endsection

@section('js')

<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>


<!-- dynamically control checkbox -->
<script type="text/javascript">

    $('.module-checkbox-control').click(function () {
        if($(this).is(':checked')) {
            $(this).closest('li').find('.parentCheckBox').prop("checked", true);
            $(this).closest('li').find('.rowChildCheckBox').prop("checked", true);
            $(this).closest('li').find('.childCheckBox').prop("checked", true);
        } else {
            $(this).closest('li').find('.parentCheckBox').prop("checked", false);
            $(this).closest('li').find('.rowChildCheckBox').prop("checked", false);
            $(this).closest('li').find('.childCheckBox').prop("checked", false);
        }
    })


    // when clicked on Check All
    $(".parentCheckBox").click(function () {
        if($(this).is(':checked')) {
            var childCheckBoxes =  $(this).closest('table').find('tbody tr input');
            childCheckBoxes.prop( "checked", true );

            $.each($(this).closest("table").find('tbody .effected_by_parent'), function(key) {
                $(this).val(1);
            });
        } else {
            var childCheckBoxes =  $(this).closest('table').find('tbody tr input');
            childCheckBoxes.prop("checked", false);

            $.each($(this).closest("table").find('tbody .effected_by_parent'), function(key) {
                $(this).val(0);
            });
        }
    });

    // when clicked on any children checkbox
    $(".childCheckBox").click(function () {
        var flag = true;
        var checkbox_table = $(this).closest('table');

        var childCheckBoxes =  checkbox_table.find('tbody');
        $(childCheckBoxes).find('input[type=checkbox]').each(function () {
            if (!this.checked) {
                flag = false;
            }
        });
        $(this).closest('table').find('thead tr input').prop("checked", flag);

    });

    // when clicked module row on module name
    $(".module_row").click(function () {
        if($(this).is(':checked')) {
            $(this).closest("label").find('.permission_module').val(1);
            var childCheckBoxes =  $(this).closest('tr').find('input');
            childCheckBoxes.prop( "checked", true );

            $.each($(this).closest("tr").find('.array_permission'), function(key) {
                $(this).val(1);
            });
        } else {
            $(this).closest("label").find('.permission_module').val(0);
            var childCheckBoxes =  $(this).closest('tr').find('input');
            childCheckBoxes.prop("checked", false);

            $.each($(this).closest("tr").find('.array_permission'), function(key) {
                $(this).val(0);
            });

        }
    });

    // when clicked on any children checkbox
    $(".rowChildCheckBox").click(function () {
        // set value 1 if checked
        if($(this).is(":checked")) {
            $(this).closest("label").find('.array_permission').val(1);
        } else {
            $(this).closest("label").find(".array_permission").val(0);
        }


        var flag = false;
        var rowChildCheckBoxes = $(this).closest('tr');

        // var rowChildCheckBoxes =  checkbox_table.find('tr');
        $(rowChildCheckBoxes).find('input[type=checkbox]').each(function (index) {
            if (this.checked) {
                if (index != 0) { flag = true; }
            }
        });

        $(this).closest('tr').find('.module_row').prop("checked", flag);

        if (flag) {
            $(this).closest('tr').find('.permission_module').val(1);
        } else {
            $(this).closest('tr').find('.permission_module').val(0);
        }

    });
</script>

<!--  Select Box Search-->
<script type="text/javascript">
    jQuery(function($){
        if(!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect:true});
        }
    })
</script>



<!-- // populate employee information when select employee id -->
<script type="text/javascript">
    
    function loadUserInfo(object)
    {
        let user = $('#select-new-user-id option:selected')

        $(".user_name").val(user.data('name'));
        $(".email").val(user.data('email'));
        $(".company-name").val(user.data('company'));
    }






    // load existing employees id to a tag
    $('.existing_user_id').change(function () {
        var id = $(this).val();
        let text = `/setting/permission-access/create?existing_user_id=${id}`
        $(".load-user").attr("href", text);
    });
</script>


<!-- accrodion -->

<script>
	function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".short-full")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
@stop
