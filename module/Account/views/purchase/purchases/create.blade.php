@extends('layouts.master')


@section('title', 'Purchase Create')



@section('page-header')
<i class="fa fa-plus-circle"></i> Purchase Create
@stop


@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/custom_css/chosen-required.css') }}" />


    <style>
        .borderRemove {
            border-top: none;
        }

        body {
            counter-reset: section;
            /* Set a counter named 'section', and its initial value is 0. */
        }

        .count:before {
            counter-increment: section;
            content: counter(section);
        }

        select:invalid {
            height: 0px !important;
            opacity: 0 !important;
            position: absolute !important;
            display: flex !important;
        }

        select:invalid[multiple] {
            margin-top: 15px !important;
        }
    </style>
@endpush






@section('content')
    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">

            <div class="widget-box widget-color-white ui-sortable-handle clearfix" id="widget-box-7">

                <!-- heading -->
                <div class="widget-header widget-header-small">
                    <h3 class="widget-title smaller text-primary">
                        @yield('page-header')
                    </h3>


                    <div class="widget-toolbar">
                        <a href="{{ route('acc-purchases.index') }}" ><i class="fa fa-list-alt"></i> List</a>
                    </div>

                </div>





                <!-- body -->
                <div class="widget-body">
                    <div class="widget-main">
                        <form class="form-horizontal" action="{{ route('acc-purchases.store') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @include('partials._alert_message')

                            <input hidden name="account_id" value="{{ $account->id }}">


                            <div class="row">




                                <!-- Supplier -->
                                <div class="col-sm-5 my-1">
                                    <div class="input-group">
                                        <span class="input-group-addon input-sm">
                                            Supplier<span class="text-danger">*</span>
                                        </span>
                                        <select required name="supplier_id" id="form_field" class="chosen-select-100-percent" data-placeholder="- Select Supplier -">
                                            <option></option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>





                                <!-- Companies -->
                                <div class="col-sm-5 my-1">
                                    <div class="input-group">
                                        <span class="input-group-addon">Company Name</span>

                                        <select required name="company_id" id="account_id" class="chosen-select-100-percent" data-placeholder="- Select Company -">
                                            <option></option>

                                            @foreach($companies as $id => $name)

                                                @if(count($companies) > 1)
                                                    <option value="{{ $id }}" {{ old('company_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                                @else
                                                    <option value="{{ $id }}" selected>{{ $name }}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                        @error('date')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>




                                <!-- Date -->
                                <div class="col-sm-2 my-1">
                                    <div class="input-group">
                                        <span class="input-group-addon input-sm">
                                            Date<span class="text-danger">*</span>
                                        </span>
                                        <input name="date" class="form-control date-picker" id="id-date-picker-1" type="text" value=" {{ old('date') ?:  date('Y-m-d') }}" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>








                                <!-- Item Details Table -->
                                <div class="col-sm-12 mt-3">
                                    <table id="myTable" class="table table-bordered order-list">



                                        <!-- head -->
                                        <thead>
                                            <tr>
                                                <td width="40px;">SL.</td>
                                                <td>Product<span class="text-danger">*</span></td>
                                                <td class="text-center" width="120px;">Unit</td>
                                                <td class="text-right" width="120px;">Purchase Price</td>
                                                <td class="text-right" width="120px;">Sale Price</td>
                                                <td class="text-right" width="120px;">Stock</td>
                                                <td class="text-right" width="120px;">Quantity</td>
                                                <td class="text-right" width="120px;">Expiry Date</td>
                                                <td class="text-right" width="120px;">Production Date</td>
                                                <td class="text-center" width="120px;">Subtotal</td>
                                                <td width="50px;"></td>
                                            </tr>
                                        </thead>



                                        <!-- body -->
                                        <tbody>
                                            @if (count(old('product_id') ?? []) > 0)
                                                @foreach(old('product_id') as $key => $value)
                                                    <tr>
                                                        <td class="count"></td>
                                                        <td>
                                                            <div class="col-sm-12 prod-price">
                                                                <div class="input-group">
                                                                    <select required name="product_id[]" onchange="enableQty('description', 'unit', 'purchasePrice-input', 'quantity-enable', this)" class="input-qty chosen-select-100-percent" data-placeholder="- Select Product -">
                                                                        <option></option>
                                                                        @foreach($products as $prod)
                                                                            <option value="{{ $prod->id }}" data-description="{{ $prod->description }}" data-unit="{{ optional($prod->unit)->name }}" data-price="{{ $prod->purchase_price }}" {{ old('product_id')[$key] == $prod->id ? 'selected' : '' }}>{{ $prod->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <label class="input-group-addon show-description" title="click to view description"><i class="fa fa-info-circle bs-tooltip"></i></label>
                                                                </div>
                                                                <div class="description-area mt-1" style="display: none">
                                                                    <textarea name="description[]" class="form-control input-sm description">{{ old('description')[$key] ?? '' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input name="unit[]" type="text" value="{{ old('unit')[$key] ?? '' }}" class="form-control text-center unit" readonly />

                                                        </td>
                                                        <td>
                                                            <input name="purchase_price[]" type="text" value="{{ old('purchase_price')[$key] }}" class="form-control text-right purchasePrice-input only-number" />

                                                        </td>
                                                        <td>
                                                            <input name="sale_price[]" type="text" value="" class="form-control only-number text-right salePrice-input" />

                                                        </td>
                                                        <td>
                                                            <input name="current_stock[]" disabled type="text" class="form-control text-right only-number current-stock" />

                                                        </td>
                                                        <td>
                                                            <input name="quantity[]" required type="text" value="{{ old('quantity')[$key] }}" class="form-control text-right only-number quantity calculate-total quantity-enable" />

                                                        </td>
                                                        <td>
                                                            <input name="expiry_at[]" required type="date" value="{{ old('expiry_at')[$key] }}" class="form-control text-right only-number expiry_at calculate-total quantity-enable" />

                                                        </td>
                                                        <td>
                                                            <input name="production_at[]" required type="date" value="{{ old('production_at')[$key] }}" class="form-control text-right only-number production_at calculate-total quantity-enable" />

                                                        </td>
                                                        <td>
                                                            <input name="subtotal[]" readonly type="text" value="{{ old('subtotal')[$key] }}" class="form-control only-number text-right sub-total input-sm" />

                                                        </td>
                                                        <td class="text-center"><a class="btn btn-sm btn-danger" disabled="disabled"><i class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                @endforeach

                                            @else

                                                <tr>
                                                    <td class="count"></td>
                                                    <td>
                                                        <div class="col-sm-12 prod-price">
                                                            <div class="input-group">
                                                                <select required name="product_id[]" onchange="enableQty('description', 'unit', 'purchasePrice-input', 'salePrice-input', 'current-stock', 'quantity-enable', this)" class="input-qty chosen-select-100-percent" data-placeholder="- Select Product -">
                                                                    <option></option>
                                                                    @foreach($products as $prod)
                                                                    <option value="{{ $prod->id }}" data-stock="{{ $prod->current_stock }}" data-description="{{ $prod->description }}" data-unit="{{ optional($prod->unit)->name }}" data-price="{{ $prod->selling_price > 0 ? $prod->selling_price : $prod->purchase_price }}" data-purchase_price="{{ $prod->purchase_price }}">
                                                                        {{ $prod->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <label class="input-group-addon show-description" title="click to view description"><i class="fa fa-info-circle bs-tooltip"></i></label>
                                                            </div>
                                                            <div class="description-area mt-1" style="display: none">
                                                                <textarea name="description[]" class="form-control input-sm description"></textarea>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input name="unit[]" type="text" value="{{ old('unit') }}" class="form-control text-center unit" readonly />
                                                        @error('unit')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input name="purchase_price[]" type="text" value="" class="form-control only-number text-right purchasePrice-input" required />

                                                    </td>
                                                    <td>
                                                        <input name="sale_price[]" type="text" value="" class="form-control only-number text-right salePrice-input" />

                                                    </td>
                                                    <td>
                                                        <input name="current_stock[]" type="text" class="form-control text-right only-number current-stock" />

                                                    </td>
                                                    <td>
                                                        <input name="quantity[]" disabled required type="text" class="form-control text-right only-number quantity calculate-total quantity-enable" />
                                                        @error('quantity')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input name="expiry_at[]" disabled required type="date" class="form-control text-right only-number expiry_at   quantity-enable" />
                                                        @error('expiry_at')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input name="production_at[]" disabled required type="date" class="form-control text-right only-number production_at   quantity-enable" />
                                                        @error('production_at')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input name="subtotal[]" readonly type="text" class="form-control only-number text-right sub-total input-sm" />
                                                        @error('subtotal')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td class="text-center"><a class="btn btn-sm btn-danger" disabled="disabled"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            @endif
                                        </tbody>




                                        <!-- footer -->
                                        <tfoot>
                                            <tr>
                                                <td colspan="6" class="text-right item-serial">Total</td>
                                                <td>
                                                    <input readonly name="qty_total" value="{{ old('qty_total') }}" class="quantityTotal text-right form-control">
                                                </td>
                                                <td colspan="3">
                                                    <input readonly name="qty_amount" value="{{ old('qty_amount') }}" class="itemTotal text-right form-control">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-success" id="addrow">+</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>








                                    <!-- Discount Amount -->
                                    <div class="row">
                                        <div class="col-md-5 pull-right">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Discount Amount</label>
                                                <div class="col-xs-12 col-sm-8 @error('cost') has-error @enderror">
                                                    <input name="discount_amount" value="{{ old('discount_amount', 0) }}" autocomplete="off" value="0.00" disabled class="discount only-number calculate-total dicount-enable text-right form-control">
                                                    @error('cost')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <!-- Total Amount -->
                                    <div class="row">
                                        <div class="col-md-5 pull-right">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Total Amount</label>
                                                <div class="col-xs-12 col-sm-8 @error('end_date') has-error @enderror">
                                                    <input name="total_amount" value="{{ old('total_amount') ?? 0 }}" readonly class="totalAmount text-right form-control">
                                                    @error('end_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <!-- Paid Amount -->
                                    <div class="row">
                                        <div class="col-md-5 pull-right">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Paid Amount</label>
                                                <div class="col-xs-12 col-sm-8 @error('end_date') has-error @enderror">
                                                    <input name="paid_amount" value="{{ old('paid_amount', 0) }}" autocomplete="off" class="paidAmount only-number calculate-paid total-credit text-right form-control">
                                                    @error('end_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <!-- Due Amount -->
                                    <div class="row">
                                        <div class="col-md-5 pull-right">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Due Amount</label>
                                                <div class="col-xs-12 col-sm-8 @error('end_date') has-error @enderror">
                                                    <input name="due_amount" value="{{ old('due_amount') ?? 0 }}" readonly class="dueAmount total-credit text-right form-control">
                                                    @error('end_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                    <!-- Action -->
                                    <div class="row">
                                        <div class="pull-right px-1">
                                            <button type="submit" class="btn btn-sm btn-success save-btn">
                                                <i class="fa fa fa-save"></i>
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
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
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/custom_js/chosen-box.js') }}"></script>
    <script src="{{ asset('assets/custom_js/date-picker.js') }}"></script>


    <script>


        const descriptionField      = $('.description')
        const enableField           = $('.quantity-enable')
        const enableDiscountField   = $('.dicount-enable')
        const inputDebit            = $('.input-debit')
        const inputCredit           = $('.input-credit')
        const draftValue            = $('.draft-value')

        const rowItem = `<tr>
                            <td class="count"></td>
                            <td>
                                <div class="col-sm-12 prod-price">
                                    <div class="input-group">
                                        <select required name="product_id[]" onchange="enableQty('description', 'unit', 'purchasePrice-input', 'salePrice-input', 'current-stock', 'quantity-enable', this)" class="input-qty chosen-select-100-percent" data-placeholder="- Select Product -">
                                            <option></option>
                                            @foreach($products as $prod)
                                            <option value="{{ $prod->id }}" data-stock="{{ $prod->current_stock }}" data-description="{{ $prod->description }}" data-unit="{{ optional($prod->unit)->name }}" data-price="{{ $prod->selling_price > 0 ? $prod->selling_price : $prod->purchase_price }}" data-purchase_price="{{ $prod->purchase_price }}">
                                                {{ $prod->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label class="input-group-addon show-description" title="click to view description"><i class="fa fa-info-circle bs-tooltip"></i></label>
                                    </div>
                                    <div class="description-area mt-1" style="display: none">
                                        <textarea name="description[]" class="form-control input-sm description"></textarea>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input name="unit[]" type="text" class="form-control text-center unit" readonly />

                            </td>
                            <td>
                                <input name="purchase_price[]" type="text" value="" class="form-control only-number text-right purchasePrice-input" required />

                            </td>
                            <td>
                                <input name="sale_price[]" type="text" value="" class="form-control only-number text-right salePrice-input" />

                            </td>
                            <td>
                                <input name="current_stock[]" type="text" class="form-control text-right only-number current-stock" />

                            </td>
                            <td>
                                <input name="quantity[]" disabled required type="text" class="form-control text-right only-number quantity calculate-total quantity-enable" />

                            </td>
                            <td>
                                <input name="expiry_at[]" disabled required type="date" class="form-control text-right only-number expiry_at   quantity-enable" />

                            </td>
                            <td>
                                <input name="production_at[]" disabled required type="date" class="form-control text-right only-number production_at   quantity-enable" />

                            </td>
                            <td>
                                <input name="subtotal[]" readonly type="text" class="form-control only-number text-right sub-total input-sm" />

                            </td>
                            <td class="text-center"><a class="btn btn-sm btn-danger ibtnDel"><i class="fa fa-trash"></i></a></td>
                        </tr>`





        $('select').chosen({
            allow_single_deselect: true
        });

        $(document).on('click', '.show-description', showDescriptionHandler);


        function showDescriptionHandler() {
            const description = $(this).closest('tr').find('.description-area');

            if(description.is(':visible')) {
                description.hide();
            } else {
                description.show();
            }
        }


        function enableQty($description, $unit, $purchase_price, $price, $current_stock, $qty, object)
        {
            let getUnit     = $(object).find('option:selected').data('unit')

            let getPrice    = $(object).find('option:selected').data('price')
            let getPPrice   = $(object).find('option:selected').data('purchase_price')

            let get_desc    = $(object).find('option:selected').data('description')
            let get_stock   = $(object).find('option:selected').data('stock')
            let unit        = $(object).closest('tr').find('.' + $unit)

            let showPrice   = $(object).closest('tr').find('.' + $price)
            let showPPrice  = $(object).closest('tr').find('.' + $purchase_price)
            let showStock   = $(object).closest('tr').find('.' + $current_stock)
            let qty         = $(object).closest('tr').find('.' + $qty)
            let description = $(object).closest('tr').find('.' + $description)

            unit.val(getUnit)
            showPrice.val(getPrice)
            showPPrice.val(getPPrice)
            showStock.val(get_stock)
            description.val(get_desc)
            qty.attr('disabled', false)
        }





        $(document).on("keyup", ".calculate-total", function() {

            calculateRowMultiply()

            calculateAmount()

            calculateDiscount()

            calculateDue()

            enableDiscountField.attr('disabled', false)
        })




        $(document).on("keyup", ".calculate-paid", function() {
            calculateDue()
        })

        function calculateDue()
        {
            let totalAmount     = Number($(".totalAmount").val())
            let paidAmount      = Number($(".paidAmount").val())
            let dueAmount       = totalAmount - paidAmount

            $(".dueAmount").val(dueAmount)
        }





        function calculateRowMultiply()
        {
            $('table tr:has(td):not(:last)').each(function() {

                let count   = 0
                let qty     = $(this).find('.quantity').val()
                let prc     = $(this).find('.purchasePrice-input').val()

                $('.quantity').each(function() {
                    count = qty * prc
                })

                $(this).find('.sub-total').val(count)

            });
        }





        function calculateAmount()
        {
            var totalAmount = 0;
            var discount = $('.discount').val();

            // Product purchase Single Price
            var purchase_price = 0;
            $(".salePrice-input").each(function() {
                purchase_price += Number($(this).val());
            });

            // Sum all quantity
            var quantity = 0;
            $(".quantity").each(function() {
                quantity += Number($(this).val());
            });

            // Sum all Sub-total
            var totalAmount = 0;
            $(".sub-total").each(function() {
                totalAmount += Number($(this).val());
            });

            $(".purchasePrice-total").val(purchase_price)
            $(".quantityTotal").val(quantity)
            $(".itemTotal").val(totalAmount)
        }






        function calculateDiscount()
        {
            let itemTotal       = $(".itemTotal").val()
            let discount        = $(".discount").val()
            let totalAmount     = Number(itemTotal) - Number(discount)


            $(".totalAmount").val(totalAmount)
        }




        $(document).ready(function() {

            let i = 0

            $("#addrow").on("click", function() {
                $("table.order-list").append(rowItem)
                chosenSelectInit()
                i++
            });




            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
                i -= 1
                calculateAmount()
                calculateDiscount()
                calculateDue()
            });
        });
    </script>

@endsection
