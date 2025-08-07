<div class="col-12 col-md-12 col-xs-6">
    <div class="widget-box" style="padding: 15px;">
        <table id="dynamic-table-for-plot" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Block</th>
                    <th>Road</th>
                    <th>Total Plot</th>
                    <th>Total Building</th>
                    <th>Total Flat</th>
                    <th>Pending Plot / Building Info</th>
                    <th>Plot Tin Shade</th>
                    <th>U/C</th>
                    <th>Vacant Plot</th>
                    <th>Plot Owner Undefined</th>
                    <th>Story</th>
                    <th>Remark</th>
                </tr>
            </thead>

            <tbody>

                {{-- @php
                    //Road count
                    $roadCounts = DB::table('roads')
                        ->select('block_name_id', DB::raw('count(*) as count'))
                        ->groupBy('block_name_id')
                        ->pluck('count', 'block_name_id');

                    //Plot count
                    $plotCounts = DB::table('plots')
                        ->select('block_id', DB::raw('count(*) as count'))
                        ->groupBy('block_id')
                        ->pluck('count', 'block_id');

                    //Tota Building
                    $buildingCounts = DB::table('house_or_building')
                        ->select('block_id', DB::raw('count(*) as count'))
                        ->groupBy('block_id')
                        ->pluck('count', 'block_id');

                    //Total Flat
                    $flatCounts = DB::table('house_or_building')
                        ->select('block_id', DB::raw('sum(totalFlat) as total_flat'))
                        ->groupBy('block_id')
                        ->pluck('total_flat', 'block_id')
                        ->toArray();

                    // Total Pending plots
                    $houses = DB::table('house_or_building')->select('block_id', 'road_id', 'plot_id')->get();
                    $housesArrayString = [];
                    foreach ($houses as $house) {
                        $concatenatedString = $house->block_id . ' ' . $house->road_id . ' ' . $house->plot_id;
                        $housesArrayString[] = $concatenatedString;
                    }

                    // Fetch plots where ownerName is not null or not empty
                    $plots = DB::table('plots')
                        ->select('block_id', 'road_id', 'id', 'ownerName')
                        ->whereNotNull('ownerName')
                        ->where('ownerName', '!=', '')
                        ->get();

                    $plotsArrayString = [];
                    $pendingPlotsCounts = [];

                    foreach ($plots as $plot) {
                        $concatenatedString = $plot->block_id . ' ' . $plot->road_id . ' ' . $plot->id;
                        $plotsArrayString[] = $concatenatedString;

                        if (!isset($pendingPlotsCounts[$plot->block_id])) {
                            $pendingPlotsCounts[$plot->block_id] = 0;
                        }
                    }

                    $commonElements = array_intersect($housesArrayString, $plotsArrayString);
                    $plotsCount = count($plotsArrayString);
                    $commonCount = count($commonElements);
                    $overallPendingPlotsCounts = $plotsCount - $commonCount;

                    foreach ($plots as $plot) {
                        $concatenatedString = $plot->block_id . ' ' . $plot->road_id . ' ' . $plot->id;
                        if (!in_array($concatenatedString, $housesArrayString)) {
                            $pendingPlotsCounts[$plot->block_id]++;
                        }
                    }

                    // Total Under-constraction plot
                    $underConstructionCount = DB::table('house_or_building')
                        ->select('block_id', DB::raw('count(*) as count'))
                        ->where('usage_type_id', 7)
                        ->groupBy('block_id')
                        ->pluck('count', 'block_id');

                    //Total Vacant plot
                    $houses = DB::table('house_or_building')->select('block_id', 'road_id', 'plot_id')->get();
                    $housesArrayString = [];
                    foreach ($houses as $house) {
                        $concatenatedString = $house->block_id . ' ' . $house->road_id . ' ' . $house->plot_id;
                        $housesArrayString[] = $concatenatedString;
                    }

                    $plots = DB::table('plots')->select('block_id', 'road_id', 'id')->get();
                    $plotsArrayString = [];
                    $pendingPlotsCounts = [];
                    $vacantPlotCounts = [];

                    foreach ($plots as $plot) {
                        $concatenatedString = $plot->block_id . ' ' . $plot->road_id . ' ' . $plot->id;
                        $plotsArrayString[] = $concatenatedString;

                        if (!isset($pendingPlotsCounts[$plot->road_id])) {
                            $pendingPlotsCounts[$plot->road_id] = 0;
                        }

                        if (!isset($vacantPlotCounts[$plot->road_id])) {
                            $vacantPlotCounts[$plot->road_id] = 0;
                        }
                    }

                    $commonElements = array_intersect($housesArrayString, $plotsArrayString);
                    $plotsCount = count($plotsArrayString);
                    $commonCount = count($commonElements);
                    $overallPendingPlotsCounts = $plotsCount - $commonCount;

                    // foreach ($plots as $plot) {
                    //     $concatenatedString = $plot->block_id . ' ' . $plot->road_id . ' ' . $plot->id;
                    //     if (!in_array($concatenatedString, $housesArrayString)) {
                    //         $pendingPlotsCounts[$plot->block_id]++;
                    //     }

                    //     if (!in_array($concatenatedString, $housesArrayString)) {
                    //         $vacantPlotCounts[$plot->block_id]++;
                    //     }
                    // }

                    foreach ($plots as $plot) {
                        $concatenatedString = $plot->block_id . ' ' . $plot->road_id . ' ' . $plot->id;

                        // Ensure key exists in pendingPlotsCounts
                        if (!isset($pendingPlotsCounts[$plot->block_id])) {
                            $pendingPlotsCounts[$plot->block_id] = 0;
                        }
                        if (!in_array($concatenatedString, $housesArrayString)) {
                            $pendingPlotsCounts[$plot->block_id]++;
                        }

                        // Ensure key exists in vacantPlotCounts
                        if (!isset($vacantPlotCounts[$plot->block_id])) {
                            $vacantPlotCounts[$plot->block_id] = 0;
                        }
                        if (!in_array($concatenatedString, $housesArrayString)) {
                            $vacantPlotCounts[$plot->block_id]++;
                        }
                    }

                    // Count tin shade
                    $tinShadeCount = DB::table('house_or_building')
                        ->select('block_id', DB::raw('count(*) as count'))
                        ->where('usage_type_id', 8)
                        ->groupBy('block_id')
                        ->pluck('count', 'block_id');

                    //Total undefined plot
                    $undefinedPlotCounts = DB::table('plots')
                        ->select('block_id', DB::raw('count(*) as count'))
                        ->where(function ($query) {
                            $query->whereNull('ownerName')->orWhere('ownerName', '');
                        })
                        ->groupBy('block_id')
                        ->pluck('count', 'block_id')
                        ->toArray();

                    //Total Storey
                    $storyCounts = DB::table('house_or_building')
                        ->select('block_id', DB::raw('sum(storey) as total_storey'))
                        ->groupBy('block_id')
                        ->pluck('total_storey', 'block_id')
                        ->toArray();
                @endphp --}}

                {{-- @if (isset($blocks))
                    @foreach ($blocks as $block)
                        <tr>
                            <td>{{ $block->blockName }}</td>
                            <td>{{ $roadCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $plotCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $buildingCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $flatCounts[$block->id] ?? 0 }}</td>
                            <td>
                                {{ $pendingPlotsCounts[$block->id] ?? 0 }}
                            </td>
                            <td>{{ $tinShadeCount[$block->id] ?? 0 }}</td>
                            <td>{{ $underConstructionCount[$block->id] ?? 0 }}</td>
                            <td>{{ $vacantPlotCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $undefinedPlotCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $storyCounts[$block->id] ?? 0 }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                @endif --}}

                @php
                    // Count the total number of roads grouped by block
                    $roadCounts = DB::table('roads')
                        ->select('block_name_id', DB::raw('COUNT(*) as count')) // Count the roads for each block
                        ->groupBy('block_name_id') // Group by block ID
                        ->pluck('count', 'block_name_id'); // Create an array with block_name_id as keys and counts as values

                    // Count the total number of plots grouped by block
                    $plotCounts = DB::table('plots')
                        ->select('block_id', DB::raw('COUNT(*) as count')) // Count plots for each block
                        ->groupBy('block_id') // Group by block ID
                        ->pluck('count', 'block_id'); // Create an array with block_id as keys and counts as values

                    // Count the total number of buildings grouped by block
                    $buildingCounts = DB::table('house_or_building')
                        ->select('block_id', DB::raw('COUNT(*) as count')) // Count buildings for each block
                        ->groupBy('block_id') // Group by block ID
                        ->pluck('count', 'block_id'); // Create an array with block_id as keys and counts as values

                    // Calculate the total number of flats in each block
                    $flatCounts = DB::table('house_or_building')
                        ->select('block_id', DB::raw('SUM(totalFlat) as total_flat')) // Sum up the total flats for each block
                        ->groupBy('block_id') // Group by block ID
                        ->pluck('total_flat', 'block_id'); // Create an array with block_id as keys and total flats as values

                    // Get all houses and create a unique string to identify them
                    $houses = DB::table('house_or_building')
                        ->select('block_id', 'road_id', 'plot_id') // Select block, road, and plot IDs
                        ->get()
                        ->map(fn($house) => $house->block_id . ' ' . $house->road_id . ' ' . $house->plot_id) // Concatenate IDs into a string
                        ->toArray();

                    // Fetch plots with ownerName set and group them by block
                    // $plots = DB::table('plots')
                    //     ->select('block_id', 'road_id', 'id', 'ownerName') // Select relevant fields
                    //     ->whereNotNull('ownerName') // Ensure ownerName is not null
                    //     ->where('ownerName', '!=', '') // Ensure ownerName is not empty
                    //     ->get();

                    // Fetch plots  group them by block
                    $plots = DB::table('plots')
                        ->select('block_id', 'road_id', 'id') // Select relevant fields
                        ->get();

                    // Calculate pending plots by comparing houses and plots
                    $pendingPlotsCounts = [];
                    foreach ($plots as $plot) {
                        $key = $plot->block_id . ' ' . $plot->road_id . ' ' . $plot->id;

                        if (!isset($pendingPlotsCounts[$plot->block_id])) {
                            $pendingPlotsCounts[$plot->block_id] = 0; // Initialize counter for block
                        }

                        if (!in_array($key, $houses)) {
                            $pendingPlotsCounts[$plot->block_id]++; // Increment if plot is not associated with a house
                        }
                    }

                    // Count under-construction plots grouped by block
                    $underConstructionCount = DB::table('house_or_building')
                        ->select('block_id', DB::raw('COUNT(*) as count')) // Count under-construction buildings
                        ->where('usage_type_id', 7) // Filter for usage_type_id indicating under-construction
                        ->groupBy('block_id') // Group by block ID
                        ->pluck('count', 'block_id'); // Create an array with block_id as keys and counts as values

                    // Calculate vacant plots by comparing houses and plots
                    $vacantPlotCounts = [];
                    foreach ($plots as $plot) {
                        $key = $plot->block_id . ' ' . $plot->road_id . ' ' . $plot->id;

                        if (!isset($vacantPlotCounts[$plot->block_id])) {
                            $vacantPlotCounts[$plot->block_id] = 0; // Initialize counter for block
                        }

                        if (!in_array($key, $houses)) {
                            $vacantPlotCounts[$plot->block_id]++; // Increment if plot is not associated with a house
                        }
                    }

                    // Count buildings categorized as "Tin Shade" grouped by block
                    $tinShadeCount = DB::table('house_or_building')
                        ->select('block_id', DB::raw('COUNT(*) as count')) // Count tin shade buildings
                        ->where('usage_type_id', 8) // Filter for tin shade type
                        ->groupBy('block_id') // Group by block ID
                        ->pluck('count', 'block_id'); // Create an array with block_id as keys and counts as values

                    // Count undefined plots (plots with no ownerName) grouped by block
                    // $undefinedPlotCounts = DB::table('plots')
                    //     ->select('block_id', DB::raw('COUNT(*) as count')) // Count undefined plots
                    //     ->where(function ($query) {
                    //         $query->whereNull('ownerName')->orWhere('ownerName', ''); // Check if ownerName is null or empty
                    //     })
                    //     ->groupBy('block_id') // Group by block ID
                    //     ->pluck('count', 'block_id'); // Create an array with block_id as keys and counts as values

                    // Fetch counts of undefined plots grouped by block_id
                    $undefinedPlotCounts = DB::table('plots')
                        ->select('block_id', DB::raw('COUNT(*) as count')) // Count undefined plots
                        ->where(function ($query) {
                            $query
                                ->whereNull('ownerName') // Check if ownerName is null
                                ->orWhere('ownerName', ''); // Or ownerName is an empty string
                        })
                        ->groupBy('block_id') // Group results by block ID
                        ->pluck('count', 'block_id'); // Create an array with block_id as keys and counts as values

                    // Calculate the total number of storeys in each block
                    $storyCounts = DB::table('house_or_building')
                        ->select('block_id', DB::raw('SUM(storey) as total_storey')) // Sum up the storeys for each block
                        ->groupBy('block_id') // Group by block ID
                        ->pluck('total_storey', 'block_id'); // Create an array with block_id as keys and total storeys as values
                @endphp



                @if (isset($blocks))
                    @foreach ($blocks as $block)
                        <tr>
                            <td>{{ $block->blockName }}</td>
                            <td>{{ $roadCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $plotCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $buildingCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $flatCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $pendingPlotsCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $tinShadeCount[$block->id] ?? 0 }}</td>
                            <td>{{ $underConstructionCount[$block->id] ?? 0 }}</td>
                            <td>{{ $vacantPlotCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $undefinedPlotCounts[$block->id] ?? 0 }}</td>
                            <td>{{ $storyCounts[$block->id] ?? 0 }}</td>
                            <td>-</td>
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

{{-- filter by block and road  --}}
<script>
    $(document).ready(function() {
        $('#block, #roadName, #plotName').on('change', function() {
            var selectedBlock = $('#block').val();
            var selectedRoad = $('#roadName').val();
            var selectedPlot = $('#plotName').val();

            $('#dynamic-table-for-plot tbody tr').each(function() {
                var blockName = $(this).find('td:nth-child(3)').text().trim();
                var roadName = $(this).find('td:nth-child(2)').text().trim();
                var plotName = $(this).find('td:nth-child(4)').text().trim();


                var shouldDisplay = true;

                if (selectedBlock && blockName !== selectedBlock) {
                    shouldDisplay = false;
                }
                if (selectedRoad && roadName !== selectedRoad) {
                    shouldDisplay = false;
                }
                if (selectedPlot && plotName !== selectedPlot) {
                    shouldDisplay = false;
                }

                $(this).toggle(shouldDisplay);
            });
        });
    });
</script>

<script>
    // $(document).ready(function() {
    //     // Event handler for Block dropdown
    //     $('#block').change(function() {
    //         var blockName = $(this).val();
    //         console.log(blockName);
    //         $.ajax({
    //             url: '{{ url('/society/getRoadInfoByBlock-2') }}/' + blockName,
    //             type: "GET",
    //             dataType: "json",
    //             success: function(data) {
    //                 console.log(data);

    //                 $('#roadName').empty();
    //                 $('#roadName').append('<option value="">Select Road</option>');

    //                 // Check if data is an array
    //                 if (Array.isArray(data)) {
    //                     $.each(data, function(key, value) {
    //                         $('#roadName').append('<option value="' + value
    //                             .roadName + '">' + value.roadName + '</option>');
    //                     });
    //                 } else {
    //                     console.error('Data is not in expected format'); // Error log
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error('Error fetching roads:', error); // Error log
    //             }
    //         });
    //     });

    //     // Event handler for Road dropdown
    //     $('#roadName').change(function() {
    //         var block = $('#block').val();
    //         var road = $(this).val();

    //         // Only fetch if both block and road are selected
    //         if (block && road) {
    //             var url = "{{ route('getPlot') }}?block=" + block + "&road=" + road;

    //             fetch(url)
    //                 .then(response => {
    //                     if (!response.ok) {
    //                         throw new Error('Network response was not ok');
    //                     }
    //                     return response.json();
    //                 })
    //                 .then(data => {
    //                     var plotSelect = $('#plotName');
    //                     plotSelect.empty();
    //                     plotSelect.append('<option value="">Select Plot</option>');

    //                     // Check if plots exist in the returned data
    //                     if (data.plots && Array.isArray(data.plots)) {
    //                         data.plots.forEach(plot => {
    //                             plotSelect.append(
    //                                 `<option value="${plot.plotName}">${plot.plotName}</option>`
    //                             );
    //                         });
    //                     } else {
    //                         plotSelect.append('<option value="">No plots available</option>');
    //                     }
    //                 })
    //                 .catch(error => {
    //                     console.error('Error fetching plots:', error);
    //                 });
    //         } else {
    //             $('#plotName').empty().append('<option value="">Select Plot</option>');
    //         }
    //     });
    // });
</script>


<script>
    $(document).ready(function() {
        $('#dynamic-table-for-plot').DataTable();
    });
</script>

<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        $('#dynamic-table-for-plot').DataTable();
    });
</script>
{{-- filter by year  --}}

</script>
