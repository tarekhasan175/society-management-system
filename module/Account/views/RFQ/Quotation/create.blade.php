@extends('layouts.master')

@section('title', 'Account Ledger')


@section('page-header')
    <i class="fa fa-info-circle"></i> Quotation
@stop


@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}"/>

    <style type="text/css">
        .rate-entry-table td,
        tr {
            border: none !important;
        }

        .bg-qty {
            background: #5759604a;
        }

        .bg-value {
            background: #33712e45;
        }

        .chosen-container > .chosen-single,
        [class*=chosen-container] > .chosen-single {
            height: 50px !important;
        }

        .container {
            width: 99%;
            margin: auto;
            padding-top: 10px;
            border-radius: 0px!important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .add-item-container {
            margin-bottom: 20px;
        }

        .add-item-container select, .add-item-container input {
            padding: 8px;
            margin-right: 10px;
        }

        .approve-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
        }

        .approve-btn:hover {
            background-color: #45a049;
        }

        .form-container {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container .form-control,
        .form-container .btn {
            margin-top: 10px;
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
                        <a href=""><i class="fa fa-list-alt"></i> List</a>
                    </div>

                </div>


                <!-- body -->
                <div class="widget-body">
                    <div class="widget-main">
                        <form id="submitTo" action="{{route('quotations.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <!-- Customer -->






                            <!-- Companies -->
                            <div class="col-md-5 my-1">
                                <div class="input-group">
                                    <span class="input-group-addon">Company Name</span>
                                    <select required name="client_company_id" id="company_id" onchange="company()" class="width-100 " style="height: 45px" data-placeholder="- Select Company -" >
                                        <option >--Select--</option>
                                        @foreach($companies as  $name)
                                            <option value="{{ $name->id}}" >{{ $name->name }}</option>

                                        @endforeach
                                    </select>
                                    @error('date')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-5 my-1">
                                <div class="input-group  ">
                                        <span class="input-group-addon input-sm">
                                            Customer<span class="text-danger">*</span>
                                        </span>
                                    <select required name="rfq_customers_id" id="rfq_customer_id" class="width-100  "  data-placeholder="- Select Customer -" style="height: 45px!important;" >
                                        <option>--Select--</option>
                                        @foreach($customers as   $name)
                                            <option value="{{ $name->id }}"  >{{ $name->customer->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <!-- Date -->
                            <div class="col-md-2 my-1">
                                <div class="input-group">
                                        <span class="input-group-addon input-sm">
                                            Date<span class="text-danger">*</span>
                                        </span>
                                    <input name="date" class="form-control date-picker" style="height: 45px" id="id-date-picker-1" type="text" value=" {{ old('date') ?:  date('Y-m-d') }}" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                        </div>
                        <div class=" "   >

                            <div class="container mt-5 mb-4">
                                <div class="row form-container">
                                    <div class="col-md-2">
                                    <select id="itemSelect" class="form-control"   style="height: 41px">
                                        <option>--select--</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->name}}"
                                                    data-description="{{$product->description}}"
                                                    data-rate="{{$product->selling_price}}">
                                                {{$product->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-md-3">
                                        <textarea class="form-control" id="itemDescription" placeholder="Description" rows="5" readonly></textarea>
                                    </div>

                                    <div class="col-md-2">
                                        <input type="number" style="height: 41px" class="form-control only-number" id="itemQty" placeholder="Qty" value="1">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="number" style="height: 41px" class="form-control only-number" id="itemRate" placeholder="Rate" readonly>
                                    </div>


                                    <div class="col-md-2">
                                        <select id="itemTax"  style="height: 41px" class="form-control">
                                            <option value="No Tax">No Tax</option>
                                            <option value="Tax 1">Tax 1</option>
                                            <option value="Tax 2">Tax 2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-center">
                                        <p class="btn btn-success btn-block" onclick="addItem()">Add Item</p>
                                    </div>
                                </div>
                            </div>




                            <table id="table" class="form-container">
                                <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Rate</th>
                                    <th>Tax</th>
                                    <th>Amount</th>
                                    <th width="5%">Edit</th>
                                </tr>
                                </thead>
                                <tbody id="invoiceTableBody">
                                <tr>

                                </tr>
                                </tbody>



                            </table>

                            <div class="row mt-2" style="display: none">
                                <div class="col-md-5 pull-right">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Discount Amount</label>
                                        <div class="col-xs-12 col-sm-8 @error('cost') has-error @enderror">
                                            <input name="discount_amount"   autocomplete="off"   value="0.00" disabled class="discount only-number calculate-total dicount-enable text-right form-control">
                                            @error('cost')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <!-- Total Amount -->
                            <div class="row mt-2">
                                <div class="col-md-5 pull-right">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Amount</label>
                                        <div class="col-xs-12 col-sm-8 @error('end_date') has-error @enderror">
                                            <input name="amount" value="" id="totalAmount" readonly class="text-right form-control">
                                            @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-5 pull-right">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Discount Amount</label>
                                        <div class="col-xs-12 col-sm-6 @error('end_date') has-error @enderror">
                                            <input name="discount_amount" value="" id="paidAmount" autocomplete="off" class="only-number calculate-paid total-credit text-right form-control">
                                            @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-xs-12 col-sm-1 @error('end_date') has-error @enderror">
                                            <p id="showDiscountInput" class="pointer" style="border:solid 1px ; border-radius: 2px; background-color: #00BE67; height: 32px ; padding-top: 5px">+%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row mt-2" id="discountRow" style="display: none;">
                                <div class="col-md-5 pull-right">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Discount (%)</label>
                                        <div class="col-xs-12 col-sm-8 @error('end_date') has-error @enderror">
                                            <input name="discount_percentage" id="discountPercentage" class="text-right form-control only-number">
                                            @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-5 pull-right">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Total Amount</label>
                                        <div class="col-xs-12 col-sm-8 @error('end_date') has-error @enderror">
                                            <input name="total_amount" value=" " id="dueAmount" readonly class="dueAmount total-credit text-right form-control">
                                            @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                                <div class="row mt-5">
                                    <div class="col-md-2 pull-right">
                                        <div class="form-group pull-right">
                                           <button id="customSubmit" type="submit" class="submit-class btn btn-success bolder">Submit</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js"></script>


{{--    <script src="{{ asset('assets/custom_js/chosen-box.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/custom_js/date-picker.js') }}"></script>--}}

    <script>



            function company() {
                let companyy = document.getElementById('company_id').value;
                console.log(companyy);
                let word = document.getElementById('rfq_customer_id');
                let url = "{{ route('ajax-company-to-customer') }}";
                let data = {
                    Company: companyy,
                };

                axios.post(url, data)
                    .then(function (response) {
                        console.log(response.data);
                        const departments = response.data;

                        word.innerHTML = '';

                        let placeholderOption = document.createElement('option');
                        placeholderOption.value = '';
                        placeholderOption.text = '--Select --';
                        word.appendChild(placeholderOption);

                        departments.sort();

                        departments.forEach(function (department) {
                            let option = document.createElement('option');
                            option.value = department.id;
                            option.text = department.customer.name;
                            word.appendChild(option);
                        });
                    })
                    .catch(function (error) {

                    })
            }



        document.addEventListener("DOMContentLoaded", function() {
            var productDropdown = document.getElementById('itemSelect');
            var itemDescription = document.getElementById('itemDescription');
            var itemRate = document.getElementById('itemRate');
             productDropdown.addEventListener('change', function() {
                 var selectedOption = productDropdown.options[productDropdown.selectedIndex];
                 itemDescription.value = selectedOption.getAttribute('data-description');
                 itemRate.value = selectedOption.getAttribute('data-rate');
            });
        });





        document.addEventListener('DOMContentLoaded', function() {
             const customSubmitBtn = document.getElementById('customSubmit');
            customSubmitBtn.addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('submitTo').submit();
            });
        });

        function addItem() {
            const itemSelect = document.getElementById('itemSelect').value;
            const itemDescription = document.getElementById('itemDescription').value;
            const itemQty = document.getElementById('itemQty').value;
            const itemRate = document.getElementById('itemRate').value;
            const itemTax = document.getElementById('itemTax').value;
            const amount = itemQty * itemRate;

            const table = document.getElementById('invoiceTableBody');

            const newRow = `
        <tr>
            <td><input type="text" name="item[]" value="${itemSelect}" readonly></td>
            <td><input type="text" name="description[]" value="${itemDescription}" readonly></td>
            <td><input type="text" name="qty[]" value="${itemQty}" readonly></td>
            <td><input type="text" name="rate[]" value="${itemRate}" readonly></td>
            <td><input type="text" name="tax[]" value="${itemTax}" readonly></td>
            <td><input type="text" name="amount[]" value="${amount.toFixed(2)}" readonly></td>
            <td><button class="remove-btn btn-danger" onclick="removeItem(this)">Remove</button></td>
        </tr>
    `;

            table.innerHTML += newRow;

            updateSummary();
        }




        function removeItem(button) {
            const row = button.parentElement.parentElement;
            row.remove();
            updateSummary();
        }

        function updateSummary() {
            let subTotal = 0;
            const rows = document.querySelectorAll('#invoiceTableBody tr');

            rows.forEach(row => {
                const cells = row.children;
                if (cells.length >= 6) {
                    const amount = parseFloat(cells[5].querySelector('input').value);
                    if (!isNaN(amount)) {
                        subTotal += amount;
                    }
                }
            });

            document.getElementById('totalAmount').value = subTotal.toFixed(2);

            const paidAmountInput = document.getElementById('paidAmount');
            const discountPercentageInput = document.getElementById('discountPercentage');
            const dueAmountInput = document.getElementById('dueAmount');

            dueAmountInput.value = subTotal.toFixed(2);

            function calculateDueAmount() {
                const paidAmount = parseFloat(paidAmountInput.value) || 0;
                const discountPercentage = parseFloat(discountPercentageInput.value) || 0;

                const discountAmount = (subTotal * discountPercentage) / 100;
                const dueAmount = subTotal - discountAmount - paidAmount;

                dueAmountInput.value = dueAmount.toFixed(2);
            }

            paidAmountInput.addEventListener('input', calculateDueAmount);
            discountPercentageInput.addEventListener('input', calculateDueAmount);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const showDiscountInputBtn = document.getElementById('showDiscountInput');
            const discountRow = document.getElementById('discountRow');

            showDiscountInputBtn.addEventListener('click', function () {
                discountRow.style.display = 'block';
            });

            updateSummary();
        });

    </script>
@endsection
