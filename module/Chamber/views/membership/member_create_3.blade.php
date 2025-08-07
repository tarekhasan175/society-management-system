@extends('layouts.master')
@section('title', 'Add New Member')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
@stop
@section('content')

    <form action="{{ route('membership.member_store_3', ['id' => $latestMemberId]) }}" method="POST" class="form-horizontal"
        enctype="multipart/form-data">
        @csrf

        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Proposed By</h4>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Proposed Member 1
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="proposedMemberName1" id="form-field-1"
                                    placeholder="Proposed Member 1" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Proposed Company 1
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="proposedCompanyName1" id="form-field-1"
                                    placeholder="Proposed Company Name 1" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Proposed Address 1
                            </label>
                            <div class="col-sm-9">
                                <textarea class="col-xs-11 col-sm-11 col-md-11" name="proposedAddress1" id="form-field-9" maxlength="50"
                                    placeholder="Proposed Address 1"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Proposed MemberShip
                                1 </label>

                            <div class="col-sm-9">
                                <input type="text" name="proposedMembershipNo1" id="form-field-1"
                                    placeholder="Proposed Membership 1" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>


                        {{-- <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Added By </label>

                            <div class="col-sm-9">
                                <input type="number" name="addedBy" id="form-field-1" placeholder="Member ID Who Add"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Added Date </label>

                            <div class="col-sm-9">
                                <input type="date" name="addedDate" id="form-field-1" placeholder="Added Date"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-md-6 col-12">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Proposed Member 2
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="proposedMemberName2" id="form-field-1"
                                    placeholder="Proposed Member 2" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Proposed Company 2
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="proposedCompanyName2" id="form-field-1"
                                    placeholder="Proposed Company Name 2" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Proposed Address
                                2</label>

                            <div class="col-sm-9">
                                <textarea class="col-xs-11 col-sm-11 col-md-11" name="proposedAddress2" id="form-field-9" maxlength="50"
                                    placeholder="Proposed Address 2"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Proposed MemberShip
                                2
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="proposedMembershipNo2" id="form-field-1"
                                    placeholder="Proposed Membership 2" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Last Entry By
                            </label>

                            <div class="col-sm-9">
                                <input type="number" name="lastEntryBy" id="form-field-1"
                                    placeholder="Member Id Who Last Entry" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Last Entry Date
                            </label>

                            <div class="col-sm-9">
                                <input type="date" name="lastEntryDate" id="form-field-1" placeholder="Added Date"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Session</label>
                            <div class="col-sm-9">
                                <select name="session" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="">Select Session</option>
                                    @foreach ($sessionName as $session)
                                        <option value="{{ $session->id }}">
                                            {{ $session->sessionName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="text-right mb-2">
                <button class="btn btn-primary" type="submit">Save and Next</button>
            </div>
        </div>

    </form>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>

@endsection
