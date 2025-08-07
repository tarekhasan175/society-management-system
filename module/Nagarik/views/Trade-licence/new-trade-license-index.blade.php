@extends('layouts.master')
@section('title','Add New User')
@section('content')

    <div class="row">

        <div class="col-sm-12">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-plus-circle"></i> {{ __('language.new_trade_licence_list') }}
                    </h4>
                    <span class="widget-toolbar">

                    </span>
                    <span class="widget-toolbar">
                        <a href="{{route('new-trade-license.create')}}">
                                                      {{ __('language.add_new_button') }}
                                                </a>
                    </span>
                </div>

                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <div style="margin: 20px;">
                            @include('partials._alert_message')
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content">
                                        <table class="table table-bordered table-responsive table-hover">
                                            <thead class="table-header">
                                            <tr  style="border-top: 1px solid #e3e3e3 !important;">
                                                <th> #</th>
                                                <th>{{ __('language.business_name') }}</th>
                                                <th width="12%">{{ __('language.licence_info') }}</th>
                                                <th> {{ __('language.date_of_business_start') }}</th>
                                                <th> {{ __('language.business_capital') }}</th>
                                                <th> {{ __('language.relation_in_business') }}</th>


                                                <th>{{ __('language.institute_address') }}</th>
                                                <th>{{ __('language.business_area_sq') }}</th>
                                                <th>{{ __('language.total_price') }}</th>
                                                <th>{{ __('language.additional_name') }}</th>
                                                <th class="align-center"> {{ __('language.condition') }}</th>
                                                <th class="align-center" width="8%">  {{ __('language.action') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($old_licenses as $old_license)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $old_license->business_name }}</td>
                                                    <td>
                                                        {{ $old_license->financialYear->start_year }}-{{ $old_license->financialYear->end_year }}, {{ $old_license->businessCategory->type }},<br>
                                                        ফি: {{ $old_license->license_fee }}
                                                    </td>
                                                    <td>{{ $old_license->business_start_date }}</td>
                                                    <td>{{ $old_license->business_capital }}</td>
                                                    <td>{{ $old_license->applicants_relation_with_company }}</td>
                                                    <td>
                                                        #house {{ $old_license->holding_no }},
                                                        Road {{ $old_license->road->name }},
                                                        Block {{ $old_license->block->name }},
                                                        Sector {{ $old_license->sector_id }},
                                                        Ward {{ $old_license->ward->name }},
                                                        {{ $old_license->region->name }}
                                                    </td>
                                                    <td>{{ $old_license->business_land_square_feet }}</td>
                                                    <td>{{ $old_license->payout_capital }}</td>
                                                    <td>{{ optional($old_license->atactmentName)->type }}</td>
                                                    <td class="align-center">
                                                        <span style=" background-color: {{ $old_license->statuss == 0 ? '#FF0000' : '#A069C3' }}; color: {{ $old_license->status == 0 ? '#000000' : '#FFFFFF' }}; border-radius: 8px; font-size: 15px;">
                                                          &nbsp;{{ $old_license->status == 0 ? __('language.unauthorized') : __('language.authorized')  }}&nbsp;
                                                        </span>
                                                    </td>
                                                    <td class="align-center">
                                                        <div class="btn-group btn-corner  action-span ">

                                                            <a href="{{ route("new-trade-license.show", $old_license->id) }}" role="button" class="btn btn-xs bs-tooltip" style="background-color: #00be59 !important; border: 1px solid #00be59 !important;" title="Full View">
                                                                <i class="fa fa-eye"></i>
                                                            </a>

                                                            <a href="{{ route("new-trade-license.edit", $old_license->id) }}" role="button" class="btn btn-xs bs-tooltip" style="background-color: rgb(75, 151, 228) !important; border: 1px solid rgb(75, 151, 228) !important;" title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>

                                                            <button type="button" onclick="delete_item('{{ route("new-trade-license.destroy", $old_license->id) }}')" class="btn btn-xs bs-tooltip" style="background-color: #d75353 !important; border: 1px solid #d75353 !important;" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('partials.paginate._paginate', ['data' => $old_licenses])
                    </div>
                </div>
            </div>
        </div>
@endsection

        @section('js')
            <script src="{{ asset('assets/custom_js/confirm_delete_dialog.js') }}"></script>
            <!-- inline scripts related to this page -->
            <script type="text/javascript">

                function delete_check(id) {
                    Swal.fire({
                        title: 'Are you sure ?',
                        html: "<b>You want to delete permanently !</b>",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        width: 400,
                    }).then((result) => {
                        if (result.value) {
                            $('#deleteCheck_' + id).submit();
                        }
                    })

                }

            </script>

@stop
