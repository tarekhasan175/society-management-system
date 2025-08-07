<html>

<head>
    <title>Summary</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-4">
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-400">

            <thead>
                <tr>
                    <th colspan="{{ 2 + count($blocks) + 5 }}"
                        class="text-left text-2xl font-bold p-2 border border-gray-400">
                        <h3>PLOT SUMMARY</h3>
                        <p>DATE : {{ \Carbon\Carbon::now()->format('d-m-Y') }} - REVISED</p>
                    </th>
                </tr>
                <tr>
                    <th colspan="2" class="border border-gray-400 p-2">BLOCK</th>
                    @foreach ($blocks as $block)
                        <th class="border border-gray-400 p-2">{{ $block->blockName }}</th>
                    @endforeach
                    <th class="border border-gray-400 p-2">G.TTL</th>
                    <th class="border border-gray-400 p-2">REMARKS</th>
                </tr>
            </thead>

            <tbody>
                @php
                    // Initialize grand total variables
                    $totalPlotsGrandTotal = 0;
                    $totalBuildingsGrandTotal = 0;
                    $totalVacatePlotsGrandTotal = 0;
                    $underConstructionGrandTotal = 0;
                    $tinShadeGrandTotal = 0;
                    $vacatePlotsGrandTotal = 0;
                    $completeFlatGrandTotal = 0;
                    $residentialFlatGrandTotal = 0;
                    $commercialFlatGrandTotal = 0;
                    $flatGrandTotal = 0;
                    $completeFlatGrandTotal = 0;
                    $residentialFlatGrandTotal = 0;
                    $commercialFlatGrandTotal = 0;
                    $flatGrandTotal = 0;
                    $pendingGrandTotal = 0;
                    $flatCountsUnderConstructionGrandTotal = 0;
                @endphp

                <tr>
                    <td class="border border-gray-400 p-2">TOTAL PLOT</td>
                    <td class="border border-gray-400 p-2">:</td>
                    @foreach ($blocks as $block)
                        @php
                            $count = $plotCounts[$block->id] ?? 0;
                            $totalPlotsGrandTotal += $count;
                        @endphp
                        <td class="border border-gray-400 p-2">{{ $count }}</td>
                    @endforeach
                    <td class="border border-gray-400 p-2">{{ $totalPlotsGrandTotal }}</td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>


                <tr>
                    <td class="border border-gray-400 p-2">TOTAL BUILDING</td>
                    <td class="border border-gray-400 p-2">:</td>
                    @foreach ($blocks as $block)
                        @php
                            $count = $buildingCounts[$block->id] ?? 0;
                            $totalBuildingsGrandTotal += $count;
                        @endphp
                        <td class="border border-gray-400 p-2">{{ $count }}</td>
                    @endforeach
                    <td class="border border-gray-400 p-2">{{ $totalBuildingsGrandTotal }}</td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>
                <tr>
                    <td class="border border-gray-400 p-2">TOTAL VACANT PLOT</td>
                    <td class="border border-gray-400 p-2">:</td>
                    @foreach ($blocks as $block)
                        @php
                            $count = $vacantPlotCounts[$block->id] ?? 0;
                            $totalVacatePlotsGrandTotal += $count;
                        @endphp
                        <td class="border border-gray-400 p-2">{{ $count }}</td>
                    @endforeach
                    <td class="border border-gray-400 p-2">{{ $totalVacatePlotsGrandTotal }}</td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>
                <tr>
                    <td class="border border-gray-400 p-2">U/CONSTRUCTION</td>
                    <td class="border border-gray-400 p-2">:</td>
                    @foreach ($blocks as $block)
                        @php
                            $count = $underConstructionCount[$block->id] ?? 0;
                            $underConstructionGrandTotal += $count;
                        @endphp
                        <td class="border border-gray-400 p-2">{{ $count }}</td>
                    @endforeach
                    <td class="border border-gray-400 p-2">{{ $underConstructionGrandTotal }}</td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>
                <tr>
                    <td class="border border-gray-400 p-2">TIN SHADE</td>
                    <td class="border border-gray-400 p-2">:</td>
                    @foreach ($blocks as $block)
                        @php
                            $count = $tinShadeCount[$block->id] ?? 0;
                            $tinShadeGrandTotal += $count;
                        @endphp
                        <td class="border border-gray-400 p-2">{{ $count }}</td>
                    @endforeach
                    <td class="border border-gray-400 p-2">{{ $tinShadeGrandTotal }}</td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>

                @php
                    $maxStoreys = 24;
                @endphp

                @for ($i = 1; $i <= $maxStoreys; $i++)
                    <tr>
                        <td class="border border-gray-400 p-2 text-right">{{ $i }} Story Building</td>
                        <td class="border border-gray-400 p-2">:</td>

                        @php
                            $storeyTotal = 0;
                        @endphp

                        @foreach ($blocks as $block)
                            @php
                                $count = $storeyCounts[$block->id][$i] ?? 0;
                                $storeyTotal += $count;
                            @endphp
                            <td class="border border-gray-400 p-2">{{ $count }}</td>
                        @endforeach

                        <td class="border border-gray-400 p-2">{{ $storeyTotal }}</td>
                        @for ($j = 0; $j < 5; $j++)
                            <td class="border border-gray-400 p-2"></td>
                        @endfor
                    </tr>
                @endfor

                <tr>
                    <td class="border border-gray-400 p-2">VACANT PLOT</td>
                    <td class="border border-gray-400 p-2">:</td>
                    @foreach ($blocks as $block)
                        @php
                            $count = $vacantPlotCounts[$block->id] ?? 0;
                            $vacatePlotsGrandTotal += $count;
                        @endphp
                        <td class="border border-gray-400 p-2">{{ $count }}</td>
                    @endforeach
                    <td class="border border-gray-400 p-2">{{ $vacatePlotsGrandTotal }}</td>
                    <!-- Display grand total here -->
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>


                <tr>
                    <td class="border border-gray-400 p-2">TTL FLAT/APARTMENT(Complete)</td>
                    <td class="border border-gray-400 p-2">:</td>
                    @foreach ($blocks as $block)
                        @php
                            $count = $completeFlatCounts[$block->id] ?? 0;
                            $completeFlatGrandTotal += $count;
                        @endphp
                        <td class="border border-gray-400 p-2">{{ $count }}</td>
                    @endforeach
                    <td class="border border-gray-400 p-2">{{ $completeFlatGrandTotal }}</td>
                    <!-- Grand total displayed -->
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>
                <tr>
                    <td class="border border-gray-400 p-2">Residential Flat/Apt</td>
                    <td class="border border-gray-400 p-2">:</td>
                    @foreach ($blocks as $block)
                        @php
                            $count = $residentialFlatCount[$block->id] ?? 0;
                            $residentialFlatGrandTotal += $count;
                        @endphp
                        <td class="border border-gray-400 p-2">{{ $count }}</td>
                    @endforeach
                    <td class="border border-gray-400 p-2">{{ $residentialFlatGrandTotal }}</td>
                    <!-- Grand total displayed -->
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>
                <tr>
                    <td class="border border-gray-400 p-2">Commercial Flat/Apt</td>
                    <td class="border border-gray-400 p-2">:</td>
                    @foreach ($blocks as $block)
                        @php
                            $count = $commercialFlatCount[$block->id] ?? 0;
                            $commercialFlatGrandTotal += $count;
                        @endphp
                        <td class="border border-gray-400 p-2">{{ $count }}</td>
                    @endforeach
                    <td class="border border-gray-400 p-2">{{ $commercialFlatGrandTotal }}</td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>

                <tr>
                    <td class="border border-gray-400 p-2">TTL FLAT/APT (U/Construction)</td>
                    <td class="border border-gray-400 p-2">:</td>
                    @foreach ($blocks as $block)
                        @php
                            $count = $flatCountsUnderConstruction[$block->id] ?? 0;
                            $flatCountsUnderConstructionGrandTotal += $count;
                        @endphp
                        <td class="border border-gray-400 p-2">{{ $count }}</td>
                    @endforeach
                    <td class="border border-gray-400 p-2">{{ $flatCountsUnderConstructionGrandTotal }}</td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>

                <tr>
                    <td class="border border-gray-400 p-2">PENDING INFORMATION</td>
                    <td class="border border-gray-400 p-2">:</td>
                    @foreach ($blocks as $block)
                        @php
                            $count = $pendingPlotsCounts[$block->id] ?? 0;
                            $pendingGrandTotal += $count;
                        @endphp
                        <td class="border border-gray-400 p-2">{{ $count }}</td>
                    @endforeach
                    <td class="border border-gray-400 p-2">{{ $pendingGrandTotal }}</td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>
            </tbody>

        </table>
    </div>
</body>

</html>
