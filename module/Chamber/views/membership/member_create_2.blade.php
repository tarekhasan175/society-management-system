@extends('layouts.master')
@section('title', 'Add New Member')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
@stop
@section('content')

    <form action="{{ route('membership.member_store_2', ['id' => $latestMemberId]) }}" method="POST" class="form-horizontal"
        enctype="multipart/form-data">
        @csrf

        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Representative Information</h4>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    {{-- div 1 --}}
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Is Own
                                Member</label>

                            <div class="col-sm-9">
                                <label>
                                    <input type="checkbox" name="isOwnMember" id="isOwnMember" value="1">
                                </label>
                            </div>
                        </div>

                        <div class="form-group" id="ownMemberFields">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>

                                <div class="col-sm-9">
                                    <input type="text" name="ownerName" id="form-field-1" placeholder="Owner Name"
                                        class="col-xs-11 col-sm-11 col-md-11">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">NID
                                    Number</label>

                                <div class="col-sm-9">
                                    <input type="text" name="ownerNationalIDNo" id="form-field-1"
                                        placeholder="Owner NID Number" class="col-xs-11 col-sm-11 col-md-11">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"
                                    for="form-field-1">Designation</label>

                                <div class="col-sm-9">
                                    <input type="text" name="ownerDesignation" id="form-field-1"
                                        placeholder="Owner Designation" class="col-xs-11 col-sm-11 col-md-11">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Contact
                                    No</label>

                                <div class="col-sm-9">
                                    <input type="text" name="ownerContactNo" id="form-field-1"
                                        placeholder="Owner Contact No" class="col-xs-11 col-sm-11 col-md-11">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Father Name
                                    No</label>

                                <div class="col-sm-9">
                                    <input type="text" name="ownerFatherName" id="form-field-1"
                                        placeholder="owner Father Name" class="col-xs-11 col-sm-11 col-md-11">
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- div 2  --}}
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Is
                                Representative</label>

                            <div class="col-sm-9">
                                <label>
                                    <input type="checkbox" name="isRepMember" id="isRepMember" value="1">
                                </label>
                            </div>

                        </div>
                        <div class="form-group" id="repMemberFields">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>

                                <div class="col-sm-9">
                                    <input type="text" name="representativeName" id="form-field-1"
                                        placeholder="Representative Name" class="col-xs-11 col-sm-11 col-md-11">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"
                                    for="form-field-1">Designation</label>

                                <div class="col-sm-9">
                                    <input type="text" name="representativeDesignation" id="form-field-1"
                                        placeholder="Representative Designation" class="col-xs-11 col-sm-11 col-md-11">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Father
                                    Name</label>

                                <div class="col-sm-9">
                                    <input type="text" name="representativeFatherName" id="form-field-1"
                                        placeholder="Representative Father Name" class="col-xs-11 col-sm-11 col-md-11">
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">NID
                                    No</label>

                                <div class="col-sm-9">
                                    <input type="text" name="representativeNationalIDNo" id="form-field-1"
                                        placeholder="Representative NID No" class="col-xs-11 col-sm-11 col-md-11">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Contact No
                                </label>

                                <div class="col-sm-9">
                                    <input type="text" name="representativeContactNo" id="form-field-1"
                                        placeholder="Representative Contact No" class="col-xs-11 col-sm-11 col-md-11">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="text-right mb-2">
                    <button class="btn btn-primary" type="submit">Save And Next</button>
                </div>
            </div>


        </div>


    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ownMemberCheckbox = document.getElementById('isOwnMember');
            var repMemberCheckbox = document.getElementById('isRepMember');
            var ownMemberFields = document.getElementById('ownMemberFields').querySelectorAll('input, select, textarea');
            var repMemberFields = document.getElementById('repMemberFields').querySelectorAll('input, select, textarea');
    
            ownMemberCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    repMemberCheckbox.checked = false;
                    repMemberFields.forEach(function(field) {
                        field.disabled = true;
                    });
                    ownMemberFields.forEach(function(field) {
                        field.disabled = false;
                    });
                }
            });
    
            repMemberCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    ownMemberCheckbox.checked = false;
                    ownMemberFields.forEach(function(field) {
                        field.disabled = true;
                    });
                    repMemberFields.forEach(function(field) {
                        field.disabled = false;
                    });
                }
            });
        });
    </script>

    <script>
        function previewImage(input) {
            var previewDiv = document.getElementById("image-preview");
            previewDiv.innerHTML = ''; // Clear previous preview

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.maxWidth = "100%";
                    img.style.maxHeight = "125px";
                    previewDiv.appendChild(img);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        function previewImage2(input) {
            var previewDiv = document.getElementById("image-preview-2");
            previewDiv.innerHTML = ''; // Clear previous preview

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.maxWidth = "100%";
                    img.style.maxHeight = "125px";
                    previewDiv.appendChild(img);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        function previewImage3(input) {
            var previewDiv = document.getElementById("image-preview-3");
            previewDiv.innerHTML = ''; // Clear previous preview

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.maxWidth = "100%";
                    img.style.maxHeight = "125px";
                    previewDiv.appendChild(img);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        function previewImage4(input) {
            var previewDiv = document.getElementById("image-preview-4");
            previewDiv.innerHTML = ''; // Clear previous preview

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.maxWidth = "100%";
                    img.style.maxHeight = "125px";
                    previewDiv.appendChild(img);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        function previewImage5(input) {
            var previewDiv = document.getElementById("image-preview-5");
            previewDiv.innerHTML = ''; // Clear previous preview

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.maxWidth = "100%";
                    img.style.maxHeight = "125px";
                    previewDiv.appendChild(img);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        function previewImage6(input) {
            var previewDiv = document.getElementById("image-preview-6");
            previewDiv.innerHTML = ''; // Clear previous preview

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.maxWidth = "100%";
                    img.style.maxHeight = "125px";
                    previewDiv.appendChild(img);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>

@endsection
