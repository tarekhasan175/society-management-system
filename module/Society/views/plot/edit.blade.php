@extends('layouts.master')
@section('title', 'Road')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <form action="{{ route('plot.update', $plot->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="col-12 col-md-12 col-xs-6">
            <div class="widget-box">

                @if ($errors->any())
                    <div class="alert alert-danger" id="error-alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
                @endif

                @if (session('failed'))
                    <div class="alert alert-danger" id="error-alert">{{ session('failed') }}</div>
                @endif

                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Edit Plot Information</h4>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center" style="margin-top: 15px;  margin-left: 20px;">
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="block">Block<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div class="">
                                <select id="block_id" name="block_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="null"> </option>

                                    @foreach ($block as $bloc)
                                        <option value="{{ $bloc->id }}" {{$bloc->id == $plot->block_id ? 'selected' : '' }}>{{ $bloc->blockName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="roadName">Road<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div class="">
                                <select id="road_id" name="road_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value=" "> </option>
                                    @foreach ($roads as $road)
                                    <option value="{{ $road->id }}" {{$road->id == $plot->road_id ? 'selected' : '' }}>{{ $road->roadName }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Plot/House<span style="color: red; margin-left: 5px; font-size: 12px;">
                                    *</span></label>
                            <div class="">
                                <input type="text" name="plotName" id="form-field-2" value="{{ $plot->plotName }}"
                                    class="col-xs-11 col-sm-11 col-md-11" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Plot Owner<span style="color: red; margin-left: 5px; font-size: 12px;">*</span>
                            </label>
                            <div id="owner-fields" class="d-flex align-items-center">
                                <?php
                                $ownersArray = explode(',', $plot->ownername);
                                $firstOwner = trim(array_shift($ownersArray));
                                ?>
                                <input type="text" name="ownername[]" placeholder="Plot Owner Name"
                                    class="col-xs-10 col-sm-10 col-md-10" value="<?php echo htmlspecialchars($firstOwner); ?>">
                                <button type="button" id="add-field" class="btn btn-sm btn-primary">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <div id="owner-fields" class="d-flex align-items-center" style="padding-top:28px;">
                                <button type="submit" class="btn btn-sm btn-info">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
           $(document).ready(function() {
    $('#block_id').change(function() {
        var blockId = $(this).val();



        if (blockId) {
            $.ajax({
                url: '{{ url('/society/getRoadsByBlock') }}/' + blockId,
                type: "GET",
                dataType: "json",
                success: function(data) {





                    $('#road_id').empty().append('<option value="">Select Road</option>'); // Clear previous options
                    $.each(data, function(key, value) {
                        $('#road_id').append('<option value="' + value.id + '">' + value.roadName + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching roads:", error);
                }
            });
        } else {
             $('#road_id').empty().append('<option value="">Select Road</option>');
        }
    });
});
    </script>



    {{-- Add multiple owner  --}}
    <script>
        // PHP: Convert the remaining owner names into a JavaScript array
        var existingOwners = <?php echo json_encode($ownersArray); ?>;

        // Function to create an input field with a remove button
        function createOwnerInput(value) {
            var newDiv = document.createElement('div');
            newDiv.classList.add('owner-input', 'd-flex', 'align-items-center', 'mt-2');

            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'ownername[]';
            newInput.placeholder = 'Plot Owner Name';
            newInput.classList.add('col-xs-10', 'col-sm-10', 'col-md-10');
            newInput.value = value; // Set existing value

            newDiv.appendChild(newInput);

            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-sm', 'btn-danger');
            removeButton.innerText = '-';

            removeButton.addEventListener('click', function() {
                newDiv.remove();
            });

            newDiv.appendChild(removeButton);

            return newDiv;
        }

        // Create input fields for each remaining existing owner
        existingOwners.forEach(function(owner) {
            var trimmedOwner = owner.trim(); // Remove extra spaces
            var ownerInput = createOwnerInput(trimmedOwner);
            document.getElementById('owner-fields').appendChild(ownerInput);
        });

        // Add event listener for the "+" button
        document.getElementById('add-field').addEventListener('click', function() {
            var newOwnerInput = createOwnerInput(''); // Empty input for new owner
            document.getElementById('owner-fields').appendChild(newOwnerInput);
        });
    </script>


@endsection
