@extends('layouts.master')
@section('title', 'Add New Member')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
@stop
@section('content')

    <form action="{{ route('membership.member_update_4', ['id' => $memberShip]) }}" method="POST" class="form-horizontal"
        enctype="multipart/form-data">
        @csrf
        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Images</h4>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="ownerNationalIDImage">Owner NID
                            </label>
                            <div class="col-sm-4">
                                <label class="ace-file-input ace-file-multiple">
                                    <input type="file"name="ownerNationalIDImage" id="iownerNationalIDImage"
                                        onchange="previewImage(this)">
                                    <span class="ace-file-container" data-title="Owner NID">
                                        <span class="ace-file-name" data-title="No File ..."><i
                                                class="ace-icon ace-icon fa fa-cloud-upload"></i></span>
                                    </span>

                                </label>
                            </div>

                            <div id="image-preview" class="col-sm-4">
                                <!-- Image display area -->
                                @if ($memberShip->ownerNationalIDImage)
                                    <img src="{{ asset('chamber/member/NID/' . $memberShip->ownerNationalIDImage) }}"
                                        alt="Owner National ID Image" class="img-responsive" />
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
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Owner Image </label>
                            <div class="col-sm-4">
                                <label class="ace-file-input ace-file-multiple">
                                    <input multiple="" type="file" name="ownerImage" id="id-input-file-3"
                                        onchange="previewImage2(this)">
                                    <span class="ace-file-container" data-title="Owner Image">
                                        <span class="ace-file-name" data-title="No File ..."><i
                                                class="ace-icon ace-icon fa fa-cloud-upload"></i></span>
                                    </span>

                                </label>
                            </div>

                            <div id="image-preview-2" class="col-sm-4">
                                <!-- Image display area -->
                                @if ($memberShip->ownerImage)
                                    <img src="{{ asset('chamber/member/Profile_Pic/' . $memberShip->ownerImage) }}"
                                        alt="Owner Image" class="img-responsive" />
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
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Representative NID
                            </label>
                            <div class="col-sm-4">
                                <label class="ace-file-input ace-file-multiple">
                                    <input multiple="" type="file" name="representativeNationalIDImage"
                                        id="id-input-file-3" onchange="previewImage3(this)">
                                    <span class="ace-file-container" data-title="Rep NID">
                                        <span class="ace-file-name" data-title="No File ..."><i
                                                class="ace-icon ace-icon fa fa-cloud-upload"></i></span>
                                    </span>

                                </label>
                            </div>

                            <div id="image-preview-3" class="col-sm-4">
                                <!-- Image display area -->
                                @if ($memberShip->representativeNationalIDImage)
                                    <img src="{{ asset('chamber/member/Rep_NID/' . $memberShip->representativeNationalIDImage) }}"
                                        alt="Res NID Image" class="img-responsive" />
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

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Trade Lisence Image
                            </label>
                            <div class="col-sm-4">
                                <label class="ace-file-input ace-file-multiple">
                                    <input multiple="" type="file" name="tradeLicenseImage" id="id-input-file-3"
                                        onchange="previewImage5(this)">
                                    <span class="ace-file-container" data-title="Trade Lisence">
                                        <span class="ace-file-name" data-title="No File ..."><i
                                                class="ace-icon ace-icon fa fa-cloud-upload"></i></span>
                                    </span>

                                </label>
                            </div>

                            <div id="image-preview-5" class="col-sm-4">

                                <!-- Image display area -->
                                @if ($memberShip->tradeLicenseImage)
                                    <img src="{{ asset('chamber/member/Trade_License/' . $memberShip->tradeLicenseImage) }}"
                                        alt="Trade Image" class="img-responsive" />
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
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tin Certificate
                                Image </label>
                            <div class="col-sm-4">
                                <label class="ace-file-input ace-file-multiple">
                                    <input multiple="" type="file" name="tinCertificateImage" id="id-input-file-3"
                                        onchange="previewImage6(this)">
                                    <span class="ace-file-container" data-title="Tin Certificate">
                                        <span class="ace-file-name" data-title="No File ..."><i
                                                class="ace-icon ace-icon fa fa-cloud-upload"></i></span>
                                    </span>

                                </label>
                            </div>

                            <div id="image-preview-6" class="col-sm-4">
                                <!-- Image display area -->
                                @if ($memberShip->tinCertificateImage)
                                    <img src="{{ asset('chamber/member/Tin_Certificate/' . $memberShip->tinCertificateImage) }}"
                                        alt="Tin Image" class="img-responsive" />
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
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Representative Image
                            </label>
                            <div class="col-sm-4">
                                <label class="ace-file-input ace-file-multiple">
                                    <input multiple="" type="file" name="representativeImage" id="id-input-file-3"
                                        onchange="previewImage4(this)">
                                    <span class="ace-file-container" data-title="Rep Image">
                                        <span class="ace-file-name" data-title="No File ..."><i
                                                class="ace-icon ace-icon fa fa-cloud-upload"></i></span>
                                    </span>

                                </label>
                            </div>

                            <div id="image-preview-4" class="col-sm-4">
                                  <!-- Image display area -->
                                  @if ($memberShip->representativeImage)
                                  <img src="{{ asset('chamber/member/Rep_Profile_Pic/' . $memberShip->representativeImage) }}"
                                      alt="Owner Image" class="img-responsive" />
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
            </div>
            <div class="text-right mb-2">
                <button class="btn btn-primary" type="submit">Save</button>
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
