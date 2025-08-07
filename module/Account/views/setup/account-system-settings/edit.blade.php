
@extends('layouts.master')
@section('title','Account System Settings')
@section('page-header')
    <i class="fa fa-gears"></i> Account System Settings
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
@stop


@section('content')

    <div class="row">

        <div class="col-sm-12">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> @yield('page-header')</h4>
                    <span class="widget-toolbar">

                    </span>
                </div>

                <div class="widget-body">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
                            @include('partials._alert_message')
                        </div>

                        <form class="form-horizontal" id="companyForm" action="{{ route('account-system-settings.update', 1) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-sm-6">

                                    <h4 class="text-center">Account Label Info</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="form-field-1-1"> Income St.(Sales1)</label>

                                        <div class="col-xs-12 col-sm-8 @error('name') has-error @enderror">
                                            <input type="text" class="form-control input-sm" name="income_statement_sales1"
                                                   value="{{ optional($accountSystemSettings)->income_statement_sales1 }}" placeholder="Sales">

                                            @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="form-field-1-1"> Income St.(Sales2) </label>

                                        <div class="col-xs-12 col-sm-8 @error('name') has-error @enderror">
                                            <input type="text" class="form-control input-sm" name="income_statement_sales2"
                                                   value="{{ optional($accountSystemSettings)->income_statement_sales2 }}" placeholder="Sales">

                                            @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="form-field-1-1"> Income St.(Cost of Goods Sold) </label>

                                        <div class="col-xs-12 col-sm-8 @error('name') has-error @enderror">
                                            <input type="text" class="form-control input-sm" name="income_statement_cost_of_goods_sold"
                                                   value="{{ optional($accountSystemSettings)->income_statement_cost_of_goods_sold }}" placeholder="Cost of Goods Sold">

                                            @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="form-field-1-1"> Income St.(Financial Expenses) </label>

                                        <div class="col-xs-12 col-sm-8 @error('name') has-error @enderror">
                                            <input type="text" class="form-control input-sm" name="income_statement_financial_expenses"
                                                   value="{{ optional($accountSystemSettings)->income_statement_financial_expenses }}" placeholder="Financial Expenses">

                                            @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- End header -->

                                </div>

                                <div class="col-sm-6">
                                    <h4 class="text-center">Account Details Info</h4>
                                    <hr>

{{--                                    <div class="form-group">--}}
{{--                                        <label class="col-sm-4 control-label" for="form-field-1-1">  </label>--}}

{{--                                        <div class="col-xs-12 col-sm-7 @error('vat_no') has-error @enderror">--}}
{{--                                            <input type="text" class="form-control input-sm" name="vat_no"--}}
{{--                                                   value="{{ old('vat_no') }}" placeholder="">--}}

{{--                                            @error('vat_no')--}}
{{--                                            <span class="text-danger">--}}
{{--                                                     {{ $message }}--}}
{{--                                                </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}



                                </div>


                            </div>
                            <br>
{{--                            <div class="row" style="margin-bottom: 30px;">--}}
{{--                                <div class="col-sm-10 col-sm-offset-1">--}}
{{--                                    <h4 class="text-center">Company Bank Account</h4>--}}
{{--                                    <hr>--}}
{{--                                    <table id="myTable" class="table table-bordered order-list">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <td>Account Name</td>--}}
{{--                                            <td>Account Number</td>--}}
{{--                                            <td>Bank Name</td>--}}
{{--                                            <td>Branch</td>--}}
{{--                                            <td>Swift Code</td>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}

{{--                                        @if (old('account_name'))--}}
{{--                                            @foreach(old('account_name') as $key => $value)--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" value="{{ old('account_name')[$key] }}" name="account_name[]" class="form-control input-sm" />--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="number" value="{{ old('account_number')[$key] }}" name="account_number[]"  class="form-control input-sm"/>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" value="{{ old('bank_name')[$key] }}" name="bank_name[]"  class="form-control input-sm"/>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" value="{{ old('branch')[$key] }}" name="branch[]"  class="form-control input-sm"/>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" value="{{ old('swift_code')[$key] }}" name="swift_code[]"  class="form-control input-sm"/>--}}
{{--                                                    </td>--}}
{{--                                                    <td><button type="button" class="ibtnDel btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}

{{--                                        @else--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <input type="text" name="account_name[]" class="form-control input-sm" />--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <input type="number" name="account_number[]"  class="form-control input-sm"/>--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <input type="text" name="bank_name[]"  class="form-control input-sm"/>--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <input type="text" name="branch[]"  class="form-control input-sm"/>--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <input type="text" name="swift_code[]"  class="form-control input-sm"/>--}}
{{--                                                </td>--}}
{{--                                                <td><a class="btn btn-sm btn-danger" disabled="disabled" ><i class="fa fa-trash"></i></a></td>--}}
{{--                                            </tr>--}}
{{--                                        @endif--}}

{{--                                        </tbody>--}}
{{--                                        <tfoot>--}}
{{--                                        <tr>--}}
{{--                                            <td colspan="5" style="text-align: right;">--}}
{{--                                                <button type="button" class="btn btn-sm btn-primary" id="addrow" >--}}
{{--                                                    + Add New--}}
{{--                                                </button>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tfoot>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            <div class="form-actions center" style="text-align: right !important;">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="ace-icon fa fa-save icon-on-right bigger-110"></i>
                                    Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>




@endsection

@section('js')
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>





    <!--Drag and drop-->
    <script type="text/javascript">
        jQuery(function($) {
            $('#id-input-file-3').ace_file_input({
                style: 'well',
                btn_choose: 'Drop files here or click to choose',
                btn_change: null,
                no_icon: 'ace-icon fa fa-cloud-upload',
                droppable: true,
                thumbnail: 'small'//large | fit

            }).on('change', function(){
                //console.log($(this).data('ace_input_files'));
                //console.log($(this).data('ace_input_method'));
            });

            // Start header, footer
            $('#header').ace_file_input({
                style: 'well',
                btn_choose: 'Drop files here or click to choose',
                btn_change: null,
                no_icon: 'ace-icon fa fa-cloud-upload',
                droppable: true,
                thumbnail: 'small'//large | fit
            });
            $('#footer').ace_file_input({
                style: 'well',
                btn_choose: 'Drop files here or click to choose',
                btn_change: null,
                no_icon: 'ace-icon fa fa-cloud-upload',
                droppable: true,
                thumbnail: 'small'//large | fit
            });
            // End header, footer
        });

    </script>
    {{--    select Box Search--}}
    <script type="text/javascript">

        jQuery(function($){

            if(!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect:true});
                //resize the chosen on window resize

                $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                            var $this = $(this);
                            $this.next().css({'width': $this.parent().width()});
                        })
                    }).trigger('resize.chosen');
                //resize chosen on sidebar collapse/expand
                $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                    if(event_name != 'sidebar_collapsed') return;
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({'width': $this.parent().width()});
                    })
                });


                $('#chosen-multiple-style .btn').on('click', function(e){
                    var target = $(this).find('input[type=radio]');
                    var which = parseInt(target.val());
                    if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                    else $('#form-field-select-4').removeClass('tag-input-style');
                });
            }

        })
    </script>


    <script type="text/javascript">

        $(document).ready(function () {
            var i = 0;

            $("#addrow").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<td><input type="text" class="form-control input-sm" name="account_name[]' + i + '"/></td>';
                cols += '<td><input type="number" class="form-control input-sm" name="account_number[]' + i + '"/></td>';
                cols += '<td><input type="text" class="form-control input-sm" name="bank_name[]' + i + '"/></td>';
                cols += '<td><input type="text" class="form-control input-sm" name="branch[]' + i + '"/></td>';
                cols += '<td><input type="text" class="form-control input-sm" name="swift_code[]' + i + '"/></td>';

                cols += '<td><button type="button" class="ibtnDel btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
                i++;
            });



            $("table.order-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                i -= 1
            });


        });


    </script>



@stop
