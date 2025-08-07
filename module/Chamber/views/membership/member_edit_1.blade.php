@extends('layouts.master')
@section('title', 'edit New Member')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
@stop
@section('content')

    <form action="{{ route('membership.member_update_1',($memberShip->id)) }}" method="POST" class="form-horizontal"
        enctype="multipart/form-data">
        @csrf
        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Business Information</h4>
                        </div>
                        {{-- <div class="col-md-6 col-6 col-xs-6 text-right">
                            <a href="#" onclick="goBack()" class="btn btn-primary"> <i class="fa fa-backward"></i>
                                Back</a>
                        </div> --}}
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Member
                                Category</label>
                            <div class="col-sm-9">
                                <select id="form-field-1" name="memberCategoryID" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="{{ $memberShip->memberCategory->id }}">
                                        {{ $memberShip->memberCategory->memberCategoryName }}
                                    </option>
                                    @foreach ($memberCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->memberCategoryName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Form No </label>

                            <div class="col-sm-9">
                                <input name="formNo" type="text"id="form-field-1" value="{{ $memberShip->formNo }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Member ID </label>

                            <div class="col-sm-9">
                                <input type="text" name="memberID" id="form-field-1" value="{{ $memberShip->memberID }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Approval Date
                            </label>

                            <div class="col-sm-9">
                                <input type="date" name="approvalDate" id="form-field-1"
                                    value="{{ $memberShip->approvalDate ? \Carbon\Carbon::parse($memberShip->approvalDate)->format('Y-m-d') : '' }}"
                                    class="col-xs-11 col-sm-11 col-md-11">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Company Name</label>

                            <div class="col-sm-9">
                                <input type="text" name="companyName" id="form-field-2" value="{{ $memberShip->memberID }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Firm Status</label>
                            <div class="col-sm-9">
                                <select name="firmStatus" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="{{$memberShip->firmstatus->id}}">{{$memberShip->firmstatus->firmStatusName}}</option>

                                    @foreach ($firmStatus as $status)
                                        <option value="{{ $status->id }}">
                                            {{ $status->firmStatusName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Location of
                                Business</label>

                            <div class="col-sm-9">
                                <input type="text" name="locationOfBusiness" id="form-field-1"
                                value="{{ $memberShip->locationOfBusiness }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Head Office
                                Location</label>

                            <div class="col-sm-9">
                                <input type="text" name="headOffice" id="form-field-1" value="{{ $memberShip->headOffice }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sales Office
                                Location</label>

                            <div class="col-sm-9">
                                <input type="text" name="salesOffice" id="form-field-1"
                                value="{{ $memberShip->salesOffice }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Nature of Business</label>
                            <div class="col-sm-9">
                                <select name="natureofBusinessID" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="{{$memberShip->businessNature->id}}">{{$memberShip->businessNature->businessNatureName}}</option>
                                    @foreach ($businessNature as $nature)
                                        <option value="{{ $nature->id }}">
                                            {{ $nature->businessNatureName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Item /
                                Product</label>

                            <div class="col-sm-9">
                                <input type="text" name="itemOrProduct" id="form-field-2"
                                value="{{ $memberShip->itemOrProduct }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Cell NO</label>

                            <div class="col-sm-9">
                                <input type="text" name="cellNo" id="form-field-2" value="{{ $memberShip->cellNo }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Telephone No</label>

                            <div class="col-sm-9">
                                <input type="text" name="telephoneNo" id="form-field-2" value="{{ $memberShip->telephoneNo }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Email</label>

                            <div class="col-sm-9">
                                <input type="email" name="email" id="form-field-2" value="{{ $memberShip->email }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Website</label>

                            <div class="col-sm-9">
                                <input type="text" name="webSite" id="form-field-2" value="{{ $memberShip->webSite }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Date of
                                Established</label>

                            <div class="col-sm-9">
                                <input type="date" name="dateofEstablishment" id="form-field-1"
                                    value="{{ $memberShip->dateofEstablishment ? \Carbon\Carbon::parse($memberShip->dateofEstablishment)->format('Y-m-d') : '' }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="district-select">District</label>
                            <div class="col-sm-9">
                                <select id="district-select" name="districtID" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="{{$memberShip->district->id}}">{{$memberShip->district->name}}</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right"
                                for="upazilla-select">Sub-District</label>
                            <div class="col-sm-9">
                                <select id="upazilla-select" name="upazillaID" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="{{$memberShip->upazilla->id}}">{{$memberShip->upazilla->name}}</option>
                                    @foreach ($upazillas as $upazilla)
                                        <option value="{{ $upazilla->id }}"
                                            data-district-id="{{ $upazilla->district_id }}">
                                            {{ $upazilla->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Trade License
                                No</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-2" name="tradeLicenseNo"
                                    value="{{$memberShip->tradeLicenseNo}}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tin Certificate
                                No</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="tinCertificateNo"
                                value="{{$memberShip->tinCertificateNo}}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="text-right mb-2">
                <button class="btn btn-primary" type="submit">Save And Next</button>
            </div>
        </div>


    </form>



    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const districtSelect = document.getElementById('district-select');
            const upazillaSelect = document.getElementById('upazilla-select');

            districtSelect.addEventListener('change', function() {
                let selectedDistrict = this.value;
                let upazillaOptions = upazillaSelect.options;

                for (let option of upazillaOptions) {
                    if (option.dataset.districtId === selectedDistrict) {
                        option.style.display = 'block';
                    } else {
                        option.style.display = 'none';
                    }
                }

                // Reset Upazilla selection when district changes
                upazillaSelect.value = "";
            });
        });
    </script>


@endsection
