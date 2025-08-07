@extends('layouts.master')
@section('title', 'Comapny Setting')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}

@stop
@section('content')

    <form action="{{ route('companySetting.update', $companySetting->id) }}" method="POST" class="form-horizontal"
        enctype="multipart/form-data">
        @csrf
        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Company Setting</h4>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-6 col-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Company Name
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="name" id="form-field-1" value="{{ $companySetting->name }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="address" id="form-field-1"
                                    value="{{ $companySetting->address }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phone
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="phone" id="form-field-1" value="{{ $companySetting->phone }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fax
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="fax" id="form-field-1" value="{{ $companySetting->fax }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="mobile" id="form-field-1" value="{{ $companySetting->mobile }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Website
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="web" id="form-field-1" value="{{ $companySetting->web }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email
                            </label>

                            <div class="col-sm-9">
                                <input type="email" name="email" id="form-field-1" value="{{ $companySetting->email }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Short Name
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="shortName" id="form-field-1"
                                    value="{{ $companySetting->shortName }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="isDefault">Is Default</label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="isDefault" id="isDefault" value="1"
                                            {{ $companySetting->isDefault == 1 ? 'checked' : $companySetting->isDefault == 0 }}>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="logo">Logo</label>
                            <div class="col-sm-4">
                                <label class="ace-file-input ace-file-multiple">
                                    <input type="file"name="logo" id="logo" onchange="previewImage(this)">
                                    <span class="ace-file-container" data-title="Logo">
                                        <span class="ace-file-name" data-title="No File ..."><i
                                                class="ace-icon ace-icon fa fa-cloud-upload"></i></span>
                                    </span>

                                </label>
                            </div>

                            <div id="image-preview" class="col-sm-4">
                                <!-- Image display area -->
                                @if ($companySetting->logo)
                                    <img style="height: 100px;"
                                        src="{{ asset('chamber/company/logo/' . $companySetting->logo) }}" alt="Logo"
                                        class="img-responsive" />
                                @else
                                    <!-- Placeholder when there is no image -->
                                    <label class="ace-file-input ace-file-multiple">
                                        <span class="ace-file-container" data-title="No Image">
                                            <span class="ace-file-name" data-title="No File ..."><i
                                                    class="ace-icon ace-icon fa fa-image"></i></span>
                                        </span>
                                    </label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Signature</label>
                            <div class="col-sm-4">
                                <label class="ace-file-input ace-file-multiple">
                                    <input multiple="" type="file" name="sign" id="id-input-file-3"
                                        onchange="previewImage2(this)">
                                    <span class="ace-file-container" data-title="signature">
                                        <span class="ace-file-name" data-title="No File ..."><i
                                                class="ace-icon ace-icon fa fa-cloud-upload"></i></span>
                                    </span>

                                </label>
                            </div>

                            <div id="image-preview" class="col-sm-4">
                                <!-- Image display area -->
                                @if ($companySetting->sign)
                                    <img style="height:100px;"
                                        src="{{ asset('chamber/company/sign/' . $companySetting->sign) }}" alt="Sign"
                                        class="img-responsive" />
                                @else
                                    <!-- Placeholder when there is no image -->
                                    <label class="ace-file-input ace-file-multiple">
                                        <span class="ace-file-container" data-title="No Image">
                                            <span class="ace-file-name" data-title="No File ..."><i
                                                    class="ace-icon ace-icon fa fa-image"></i></span>
                                        </span>
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>

        </div>
        </div>
    </form>

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


@endsection
