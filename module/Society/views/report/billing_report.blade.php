<div class="col-12 col-md-12 col-xs-6">
    <div class="widget-box">

        <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px; margin-bottom:20px;">
            <!-- Year Dropdown -->
            <div class="col-md-2 col-12">
                <div class="form-group">
                    <label class="control-label no-padding-right" for="year">Year
                        <span style="color: red; margin-left: 5px; font-size: 12px;">*</span>
                    </label>
                    <div>
                        <select id="year" name="year" class="col-xs-11 col-sm-11 col-md-11" required>
                            <option value="">Select Year</option>
                            @foreach ($years as $year)
                                <option value="{{ $year->id }}"
                                    {{ request('year') == $year->id ? 'selected' : '' }}>
                                    {{ $year->year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Month Dropdown -->
            <div class="col-md-2 col-12">
                <div class="form-group">
                    <label class="control-label no-padding-right" for="month">Month
                        <span style="color: red; margin-left: 5px; font-size: 12px;">*</span>
                    </label>
                    <div>
                        <select id="month" name="month" class="col-xs-11 col-sm-11 col-md-11" required>
                            <option value="">Select Month</option>
                            @foreach ($months as $month)
                                <option value="{{ $month->id }}"
                                    {{ request('month') == $month->id ? 'selected' : '' }}>
                                    {{ $month->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Block Dropdown -->
            <div class="col-md-2 col-12">
                <div class="form-group">
                    <label class="control-label no-padding-right" for="block">Block
                        <span style="color: red; margin-left: 5px; font-size: 12px;">*</span>
                    </label>
                    <div>
                        <select id="block" name="block" class="col-xs-11 col-sm-11 col-md-11" required>
                            <option value="">Select Block</option>
                            @foreach ($blocks as $block)
                                <option value="{{ $block->id }}"
                                    {{ request('block') == $block->id ? 'selected' : '' }}>
                                    {{ $block->blockName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <!-- Road dropdown -->
            <div class="col-md-2 col-12">
                <div class="form-group">
                    <label class="control-label no-padding-right" for="roadName">Road</label>
                    <div>
                        <select id="roadName" name="road" class="col-xs-11 col-sm-11 col-md-11">
                            <option value="">Select Road</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Plot dropdown -->
            <div class="col-md-2 col-12">
                <div class="form-group">
                    <label class="control-label no-padding-right" for="plotName">Plot</label>
                    <div>
                        <select id="plotName" name="plot" class="col-xs-11 col-sm-11 col-md-11">
                            <option value="">Select Plot</option>
                        </select>
                    </div>
                </div>
            </div>


            <!-- usageType dropdown -->
            <div class="col-md-2 col-12">
                <div class="form-group">
                    <label class="control-label no-padding-right" for="usageType">Usage Type
                    </label>
                    <div>
                        <select id="usageType" name="usageType" class="col-xs-11 col-sm-11 col-md-11">
                            <option value="">Select Usage Type</option>
                            @foreach ($usageTypes as $usageType)
                                <option value="{{ $usageType->id }}">
                                    {{ $usageType->typeName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 col-12 text-right" style="padding-left:15px; padding-right:20px;">
                <div class="form-group" style="padding-top: 25px;">
                    <button type="button" id="searchButton" onclick="billFilter()"
                        class="btn btn-sm btn-info">Search</button>
                </div>
            </div>

        </div>

    </div>
</div>


<div class="col-12 col-md-12 col-xs-6">
    <div class="widget-box" style="padding: 15px;">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Bill No</th>
                    <th>Block</th>
                    <th>Road</th>
                    <th>Plot</th>
                    <th>Flat Name</th>
                    <th>Flat ID</th>
                    <th>Owner Name</th>
                    <th>Usage Type</th>
                    <th>Charge</th>
                    <th>Due</th>
                </tr>
            </thead>
            <tbody>

                @if (isset($generateBills))
                    @foreach ($generateBills as $report)
                        <tr>
                            <td>{{ $report->billNo ?? '' }}</td>
                            <td>{{ $report->Block->blockName ?? '' }}</td>
                            <td>{{ $report->roads->roadName ?? '' }}</td>
                            <td>{{ $report->plot->plotName ?? '' }}</td>
                            <td>{{ $report->flat->flatName ?? '' }}</td>
                            <td>{{ $report->flats ?? '' }}</td>
                            <td>{{ $report->flat->ownerName ?? '' }}</td>
                            <td>{{ $report->gettype->typeName ?? '' }}</td>
                            <td>{{ $report->amount ?? '' }}</td>
                            <td>{{ $report->monthlyDue ?? '' }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('aceadmin/assets/js/chosen.jquery.min.js') }}"></script>


<!-- fatching road and plot data by block -->
<script>
    $(document).ready(function() {
        $('#block').change(function() {
            var blockName = $(this).val();

            $.ajax({
                url: '{{ url('/society/report/getRoadInfoByBlock') }}/' + blockName,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#roadName').empty();
                    $('#roadName').append('<option value="">Select Road</option>');
                    $.each(data, function(key, value) {
                        $('#roadName').append('<option value="' + value.road.id +
                            '">' + value.road.roadName + '</option>');
                    });
                },
                error: function(xhr, status, error) {}
            });
        });


        $('#roadName').change(function() {
            var roadName = $(this).val();

            $.ajax({
                url: '{{ url('/society/report/getPlotInfoByRoad') }}/' + roadName,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#plotName').empty();
                    $('#plotName').append('<option value="">Select Plot</option>');
                    $.each(data, function(key, value) {
                        $('#plotName').append('<option value="' + value.plot_id +
                            '">' + value.plotName + '</option>');
                    });

                },
                error: function(xhr, status, error) {}
            });
        });
    });
</script>


<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        $('#dynamic-table').DataTable();
    });
</script>


<!-- filter by block, road, plot, usageType -->
<script>
    function billFilter() {
        var selectedYear = $('#year').val();
        var selectedMonth = $('#month').val();
        var selectedBlock = $('#block').val();
        var selectedRoad = $('#roadName').val();
        var selectedPlot = $('#plotName').val();
        var selectedusageType = $('#usageType').val();

        if (!selectedYear || !selectedMonth || !selectedBlock) {
            Swal.fire('Error', 'Year, Month, and Block are required.');
            return;
        }

        var url = "{{ url('society/report/filtered-bill') }}" +
            "?year=" + encodeURIComponent(selectedYear) +
            "&month=" + encodeURIComponent(selectedMonth) +
            "&block=" + encodeURIComponent(selectedBlock) +
            "&road=" + encodeURIComponent(selectedRoad) +
            "&plot=" + encodeURIComponent(selectedPlot) +
            "&usageType=" + encodeURIComponent(selectedusageType);

        window.location.href = url;
    }
</script>


<!-- Send the searching data to print route to generate the report pdf file. -->
<script>
    function generatePrintURL() {
        var params = new URLSearchParams(window.location.search);
        var year = params.get('year');
        var month = params.get('month');
        var block = params.get('block');
        var road = params.get('road');
        var plot = params.get('plot');
        var usageType = params.get('usageType');

        if (year === "" && month === "" && block === "" && road === "" && plot === "" && usageType === "") {
            Swal.fire('Error', 'Something went worng. Please try again.');
            return;
        }

        var url = "{{ route('print.report') }}?";

        if (year !== "") {
            url += "year=" + year + "&";
        }
        if (month !== "") {
            url += "month=" + month + "&";
        }
        if (block !== "") {
            url += "block=" + block + "&";
        }
        if (road !== "") {
            url += "road=" + road + "&";
        }
        if (plot !== "") {
            url += "plot=" + plot + "&";
        }
        if (usageType !== "") {
            url += "usageType=" + usageType + "&";
        }

        url = url.slice(-1) === "&" ? url.slice(0, -1) : url;

        window.open(url, '_blank');
    }
</script>
