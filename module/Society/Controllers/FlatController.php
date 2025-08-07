<?php

namespace Module\Society\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Module\Society\Models\Flat;
use Module\Society\Models\GenerateBill;
use Module\Society\Models\HouseOrBuilding;
use Module\Society\Models\Plot;
use Module\Society\Models\UsageType;
use Module\Society\Models\Year;
use App\Models\Company;
use App\Models\Month;
use Module\Society\Models\Road;
use Module\Society\Models\Block;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FlatinfoExport;


class FlatController extends Controller
{
    private $service;


    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct() {}


















    public function create()
    {
        $houseOrBuildings           = HouseOrBuilding::all();



        $blocks                     = Block::all();
        $years                      = Year::orderBy('year', 'desc')->get();
        $months                     = Month::orderBy('name', 'desc')->get();
        $usageTypes                 = UsageType::all();

        return view('flat.create', compact('houseOrBuildings', 'usageTypes', 'months', 'years', 'blocks', 'months'));
    }



















    public function list()
    {
        $companies                  = Company::first();
        $blocks                     = Flat::with('getblock')
            ->get()
            ->unique('block_id');

        $usagetypes                 = UsageType::all();
        $flats                      = Flat::with('usagetype')->latest()->paginate(30);

        $data = [
            'flats'                 => $flats,
            'blocks'                => $blocks,
            'usagetypes'            => $usagetypes,
            'companies'             => $companies,
        ];

        return view('flat.list', $data);
    }














    public function filterFlat(Request $request)
    {
        $flat                      = Flat::query()
            ->when($request->filled('usagetype'), function ($q) use ($request) {
                $q->whereHas('usagetype', function ($query) use ($request) {
                    $query->where('id', $request->usagetype);
                });
            })
            ->when($request->filled('block'), function ($q) use ($request) {
                $q->whereHas('getblock', function ($query) use ($request) {
                    $query->where('id', $request->block);
                });
            })
            ->when($request->filled('road'), function ($q) use ($request) {
                $q->whereHas('road', function ($query) use ($request) {
                    $query->where('id', $request->road);
                });
            })
            ->when($request->filled('plot'), function ($q) use ($request) {
                $q->whereHas('getplot', function ($query) use ($request) {
                    $query->where('id', $request->plot);
                });
            })
            ->when($request->filled('flat'), function ($q) use ($request) {
                $q->where('id', $request->flat);
            })
            ->orderBy('id', 'desc')
            ->get();


        $roads                      = null;
        if ($request->block) {
            $roads                  = Road::where('block_name_id', $request->block)
                ->get()
                ->unique('roadName');
        }

        $plots                      = null;
        if ($request->road) {
            $plots                  = Plot::where('road_id', $request->road)
                ->get()
                ->unique('plotName');
        }




        $flats                      = null;
        if ($request->plot) {
            $flats                  = Flat::where('plot_id', $request->plot)
                ->get()
                ->unique('flatID');
        }

        $uniqueFlatIds              = $flat->pluck('id')->unique();

        $flats                      = collect();

        $flats                      = Flat::whereIn('id', $uniqueFlatIds)
            ->paginate(50);

        $years                      = Year::orderBy('year', 'desc')->get();
        $months                     = Month::all()->unique('name');

        $blocks                     = Flat::with('getblock')
            ->get()
            ->unique('block_id');

        $usagetypes                 = UsageType::all();

        $search                     = 1;

        return view('flat.list', compact('flat', 'search', 'flats', 'blocks', 'months', 'years', 'roads', 'plots', 'usagetypes'));
    }

















    public function downloadFilteredCSV(Request $request)
    {
        $filteredData = Flat::query()
            ->when($request->filled('usagetype'), function ($q) use ($request) {
                $q->whereHas('usagetype', function ($query) use ($request) {
                    $query->where('id', $request->usagetype);
                });
            })
            ->when($request->filled('block'), function ($q) use ($request) {
                $q->whereHas('getblock', function ($query) use ($request) {
                    $query->where('id', $request->block);
                });
            })
            ->when($request->filled('road'), function ($q) use ($request) {
                $q->whereHas('road', function ($query) use ($request) {
                    $query->where('id', $request->road);
                });
            })
            ->when($request->filled('plot'), function ($q) use ($request) {
                $q->whereHas('getplot', function ($query) use ($request) {
                    $query->where('id', $request->plot);
                });
            })
            ->when($request->filled('flat'), function ($q) use ($request) {
                $q->where('id', $request->flat);
            })
            ->orderBy('id', 'desc')
            ->get();

        $flats = $filteredData->groupBy(function ($flat) {
            return optional($flat->getblock)->blockName .
                optional($flat->road)->roadName .
                optional($flat->getplot)->plotName;
        });

        $flatData                   = [];
        $serial                     = 1;
        foreach ($flats as $flatGroup) {
            $flatGroup              = $flatGroup->sortByDesc('flatID');
            foreach ($flatGroup as $flat) {
                $flat->serial       = $serial;
                $flatData[]         = $flat;
            }
            $serial++;
        }

        $company                    = Company::first();

        $csvFileName                = 'filtered_flats.csv';
        $headers = [
            'Content-Type'          => 'text/csv',
            'Content-Disposition'   => "attachment; filename=\"$csvFileName\"",
        ];

        $columns = [
            'Serial',
            'Flat ID',
            'Block Name',
            'Road Name',
            'Plot/House Name',
            'Storey',
            'Total Unit',
            'Flat Name',
            'Owner Name',
            'Owner Contact No',
            'Tenant Name',
            'Tenant Contact No',
            'Type Name',
            'Society Member ID',
            'Amount',
            'Total Due',
            'Advance',
            'Remarks',
        ];

        $callback = function () use ($flatData, $columns, $company) {
            $file = fopen('php://output', 'w');

            $companyInfo            = $company->name ?? 'Company Name';
            $addressInfo            = $company->head_office ?? 'Head Office Address';
            $contactInfo            = 'Tel: ' . ($company->tel_number ?? 'Phone Number') . ' | Email: ' . ($company->email ?? 'Email Address');

            fputcsv($file, [$companyInfo]);
            fputcsv($file, [$addressInfo]);
            fputcsv($file, [$contactInfo]);
            fputcsv($file, []);

            fputcsv($file, $columns);

            foreach ($flatData as $flat) {
                fputcsv($file, [
                    $flat->serial ?? '',
                    $flat->flatID ?? '',
                    optional($flat->getblock)->blockName ?? '',
                    optional($flat->road)->roadName ?? '',
                    optional($flat->getplot)->plotName ?? '',
                    $flat->storey ?? '',
                    $flat->totalUnit ?? '',
                    $flat->flatName ?? '',
                    $flat->ownerName ?? '',
                    $flat->ownerContactNo1 ?? '',
                    $flat->tenantName ?? '',
                    $flat->tenantContactNo ?? '',
                    optional($flat->usagetype)->typeName ?? '',
                    $flat->societyMemberId ?? '',
                    $flat->amount ?? '',
                    $flat->totalDue ?? '',
                    $flat->advance ?? '',
                    $flat->remarks ?? '',
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }





















    public function downloadFilteredExcel(Request $request)
    {
        $filteredData = Flat::query()
            ->when($request->filled('usagetype'), function ($q) use ($request) {
                $q->whereHas('usagetype', function ($query) use ($request) {
                    $query->where('id', $request->usagetype);
                });
            })
            ->when($request->filled('block'), function ($q) use ($request) {
                $q->whereHas('getblock', function ($query) use ($request) {
                    $query->where('id', $request->block);
                });
            })
            ->when($request->filled('road'), function ($q) use ($request) {
                $q->whereHas('road', function ($query) use ($request) {
                    $query->where('id', $request->road);
                });
            })
            ->when($request->filled('plot'), function ($q) use ($request) {
                $q->whereHas('getplot', function ($query) use ($request) {
                    $query->where('id', $request->plot);
                });
            })
            ->when($request->filled('flat'), function ($q) use ($request) {
                $q->where('id', $request->flat);
            })
            ->orderBy('id', 'desc')
            ->get();

        $companies = Company::first();

        return Excel::download(new FlatinfoExport($filteredData, $companies), 'flat_information.xlsx');
    }





















    public function getRoadInfoByBlock($block)
    {
        $roads = HouseOrBuilding::select('road_id')
            ->where('block_id', $block)
            ->distinct()
            ->with('road')
            ->get();

        if ($roads->isEmpty()) {
            return response()->json([], 404);
        }

        return response()->json($roads);
    }
















    public function getPlotInfoByRoad($road)
    {
        $plots = HouseOrBuilding::select('plot_id', 'road_id')
            ->where('road_id', $road)
            ->distinct()
            ->with('plot')
            ->get();

        if ($plots->isEmpty()) {
            return response()->json([], 404);
        }

        return response()->json($plots);
    }

















    public function getFlatsByPlot($plotName)
    {
        $houses = HouseOrBuilding::where('plot_id', $plotName)
            ->get()
            ->unique('id');
        if ($houses->isEmpty()) {
            return response()->json([], 404);
        }

        return response()->json($houses);
    }
















    public function getOwnerByFlat($houseOrBuildingId)
    {
        $houseDetails = HouseOrBuilding::where('id', $houseOrBuildingId)->first();
        if (!$houseDetails) {
            return response()->json([], 404);
        }
        return response()->json([$houseDetails]);
    }












    public function getOwnerName(Request $request)
    {

        $block     = $request->query('block');
        $road      = $request->query('road');
        $plotName  = $request->query('plotName');
        $plotOwner = Plot::where('id', $plotName)
            ->where('road_id', $road)
            ->where('block_id', $block)
            ->first(['ownername']);

        return response()->json(['ownername' => $plotOwner ? $plotOwner->ownername : '']);
    }













    public function getAmountByType($typeName)
    {
        $types = UsageType::where('id', $typeName)->get(['amount']);
        return response()->json($types);
    }



    public function edit($id)
    {
        $flat                           = Flat::findOrFail($id);
        $flat->id;
        $houseOrBuildings               = HouseOrBuilding::all();
        $data['houseOrBuildingsId']     = HouseOrBuilding::all();
        $data['plots']                  = Plot::all();
        $data['plot']                   = Plot::find($id);
        $data['usageTypes']             = UsageType::all();
        $data['roads']                  = Road::all();
        $data['block']                  = Block::all();
        $data['dueEdits']               = GenerateBill::where('flat_id',  $flat->id)->get();
        $months                         = Month::all();
        $years                          = Year::orderBy('year', 'desc')->get();
        $usageTypes                     = UsageType::all();
        $selectedHouseOrBuilding        = HouseOrBuilding::where('houseOrBuildingId', $flat->houseOrBuildingId)->first();
        return view('flat.edit', compact('houseOrBuildings', 'usageTypes', 'months', 'years', 'flat', 'selectedHouseOrBuilding'), $data);
    }

















    public function store(Request $request)
    {

        $request->validate([
            'block_id'                  => ['nullable', 'string'],
            'roadName'                  => ['nullable', 'string'],
            'plotName'                  => ['nullable', 'string'],
            'houseOrBuildingId'         => ['nullable', 'string'],
            'storey'                    => ['nullable', 'string'],
            'totalUnit'                 => ['nullable', 'string'],
            'unitName'                  => ['nullable', 'string'],
            'ownerName'                 => ['nullable', 'string'],
            'ownerContactNo1'           => ['nullable', 'string'],
            'ownerContactNo2'           => ['nullable', 'string'],
            'ownerMailAddress'          => ['nullable', 'email'],
            'ownerPresentAddress'       => ['nullable', 'string'],
            'tenantName'                => ['nullable', 'string'],
            'tenantContactNo'           => ['nullable', 'string'],
            'tenantParmanentAddress'    => ['nullable', 'string'],
            'typeName'                  => ['nullable', 'string'],
            'amount'                    => ['nullable', 'string'],
            'societyMemberId'           => ['nullable', 'string'],
            'monthlyDue'                => ['nullable', 'array'],
            'monthlyDue.*'              => ['nullable', 'string'],
            'month'                     => ['nullable', 'array'],
            'month.*'                   => ['nullable', 'string'],
            'year'                      => ['nullable', 'array'],
            'year.*'                    => ['nullable', 'string'],
        ]);


        $plotID                         = Plot::where('id', $request->plot_id)->first();
        $typeName                       = UsageType::where('id', $request->usage_type_id)->value('typeName');
        $typeID                         = Str::substr(Str::upper($typeName), 0, 1);
        $flatCount                      = Flat::orderBy('created_at', 'desc')->value('id') ?? 0;
        $nextSequence                   = $flatCount;
        $sequenceFormatted              = str_pad($nextSequence, 4, '0', STR_PAD_LEFT);



        $houseOrBuildingId              = HouseOrBuilding::where('id', $request->house_Building_id)->value('houseOrBuildingId');
        $flatID                         = $typeID . '-' . $houseOrBuildingId;
        $flatName                       = $request->input("unitName");

        $flat = Flat::create([
            'plotID'                    => $plotID->plotID,
            'block_id'                  => $request->input('block_id'),
            'road_id'                   => $request->input('road_id'),
            'plot_id'                   => $request->input('plot_id'),
            'house_Building_id'         => $request->input('house_Building_id'),
            'plotOwner'                 => $plotID->ownername,
            'storey'                    => $request->input('storey'),
            'totalUnit'                 => $request->input('totalUnit'),
            'unitName'                  => $request->input('unitName'),
            'flatName'                  => $flatName,
            'ownerName'                 => $request->input('ownerName'),
            'ownerContactNo1'           => $request->input('ownerContactNo1'),
            'ownerContactNo2'           => $request->input('ownerContactNo2'),
            'ownerMailAddress'          => $request->input('ownerMailAddress'),
            'ownerPresentAddress'       => $request->input('ownerPresentAddress'),
            'tenantName'                => $request->input('tenantName'),
            'tenantContactNo'           => $request->input('tenantContactNo'),
            'tenantParmanentAddress'    => $request->input('tenantParmanentAddress'),
            'usage_type_id'             => $request->input('usage_type_id'),
            'amount'                    => $request->input('amount'),
            'remarks'                   => $request->input('remarks'),
            'societyMemberId'           => $request->input('societyMemberId'),
            'totalDue'                  => $request->input('totalDue'),
        ]);

        $flat->update([
            'flatID'                    => $flatID  . '-' . $flat->id,
        ]);


        if (isset($request->year) && isset($request->month) && isset($request->monthlyDue)) {

            $totalMonthlyDue            = 0;
            $roadName                   = $request->input("roadName");


            $block_id                   = $request->input('block_id');
            $road_id                    = $request->input('road_id');

            foreach ($request->year as $index => $year) {

                $month                  = $request->month[$index];
                $billingID              = $year . '-' . $month . '-' . $road_id . '-' . $block_id;
                $typeName               = $request->input("usage_type_id");
                $usageTypeTitle         = UsageType::where('id', $typeName)->first();
                $monthlyDue             = $request->monthlyDue[$index];
                $totalMonthlyDue        += $monthlyDue;

                GenerateBill::create([
                    'flat_id'           => $flat->id,
                    'year_id'           => $year,
                    'month_id'          => $month,
                    'block_id'          => $request->input('block_id'),
                    'road_id'           => $request->input('road_id'),
                    'plot_id'           => $request->input('plot_id'),
                    'plotID'            => $plotID->plotID,
                    'flats'             => $flatID,
                    'units'             => $request->input('unitName'),
                    'usageType'         => $usageTypeTitle->typeName,
                    'amount'            => $request->input('amount'),
                    'billingID'         => $billingID,
                    'billNo'            => $this->generateUniqueBillNo($year, $month, $roadName),
                    'usageTypeTitle'    => $usageTypeTitle->title,
                    'usage_type_id'     => $request->input('usage_type_id'),
                    'monthlyDue'        => $monthlyDue,
                ]);
            }

            if ($flat->id) {
                $lastCreatedFlat        = Flat::find($flat->id);
                if ($lastCreatedFlat) {
                    $lastCreatedFlat->update([
                        'totalDue'      => $totalMonthlyDue,
                    ]);
                }
            }
        }

        return redirect(route('flat.list'))->with('success', 'Flat Added Successfully');
    }


















    protected function generateUniqueBillNo($year, $textMonth, $road)
    {
        $monthMap = [
            'January'                   => '01',
            'February'                  => '02',
            'March'                     => '03',
            'April'                     => '04',
            'May'                       => '05',
            'June'                      => '06',
            'July'                      => '07',
            'August'                    => '08',
            'September'                 => '09',
            'October'                   => '10',
            'November'                  => '11',
            'December'                  => '12',
        ];

        $yearLastTwoDigits              = substr($year, -2);
        $monthPadded                    = $monthMap[$textMonth] ?? '01';
        $sequence                       = 1;

        do {
            $sequencePadded             = str_pad($sequence, 4, '0', STR_PAD_LEFT);
            $billNo                     = $yearLastTwoDigits . $monthPadded . $road . $sequencePadded;
            $sequence++;
        } while (GenerateBill::where('billNo', $billNo)->exists());

        return $billNo;
    }




















    public function update(Request $request, $id)
    {
        // dd($request->all());
        $flat                           = Flat::findOrFail($id);

        $request->validate([
            'blockName'                 => ['nullable', 'string'],
            'roadName'                  => ['nullable', 'string'],
            'plotName'                  => ['nullable', 'string'],
            'houseOrBuildingId'         => ['nullable', 'string'],
            'storey'                    => ['nullable', 'string'],
            'totalUnit'                 => ['nullable', 'string'],
            'unitName'                  => ['nullable', 'string'],
            'ownerName'                 => ['nullable', 'string'],
            'ownerContactNo1'           => ['nullable', 'string'],
            'ownerContactNo2'           => ['nullable', 'string'],
            'ownerMailAddress'          => ['nullable', 'email'],
            'ownerPresentAddress'       => ['nullable', 'string'],
            'tenantName'                => ['nullable', 'string'],
            'tenantContactNo'           => ['nullable', 'string'],
            'tenantParmanentAddress'    => ['nullable', 'string'],
            'typeName'                  => ['nullable', 'string'],
            'amount'                    => ['nullable', 'string'],
            'payable_amount'            => ['nullable', 'string'],
            'societyMemberId'           => ['nullable', 'string'],
            'monthlyDue'                => ['nullable', 'array'],
            'monthlyDue.*'              => ['nullable', 'string'],
            'month'                     => ['nullable', 'array'],
            'month.*'                   => ['nullable', 'string'],
            'year'                      => ['nullable', 'array'],
            'year.*'                    => ['nullable', 'string'],
        ]);


        $plotID                         = Plot::where('id', $request->plot_id)->first();
        $houseOrBuildingId              = HouseOrBuilding::where('id', $request->house_Building_id)->value('houseOrBuildingId');

        $typeName                       = UsageType::where('id', $request->usage_type_id)->value('typeName');
        $typeID                         = Str::substr(Str::upper($typeName), 0, 1);
        $flatID                         = $typeID . '-' . $houseOrBuildingId . '-' . $flat->id;

        $flat->update([
            'plotID'                    => $plotID->plotID,
            'flatID'                    => $flatID,
            'block_id'                  => $request->input('block_id'),
            'road_id'                   => $request->input('road_id'),
            'plot_id'                   => $request->input('plot_id'),
            'house_Building_id'         => $request->input('house_Building_id'),
            'plotOwner'                 => $plotID->ownername,
            'storey'                    => $request->input('storey'),
            'totalUnit'                 => $request->input('totalUnit'),
            'unitName'                  => $request->input('unitName'),
            'flatName'                  => $request->input('unitName'),
            'ownerName'                 => $request->input('ownerName'),
            'ownerContactNo1'           => $request->input('ownerContactNo1'),
            'ownerContactNo2'           => $request->input('ownerContactNo2'),
            'ownerMailAddress'          => $request->input('ownerMailAddress'),
            'ownerPresentAddress'       => $request->input('ownerPresentAddress'),
            'tenantName'                => $request->input('tenantName'),
            'tenantContactNo'           => $request->input('tenantContactNo'),
            'tenantParmanentAddress'    => $request->input('tenantParmanentAddress'),
            'usage_type_id'             => $request->input('usage_type_id'),
            'amount'                    => $request->input('amount'),
            'payable_amount'            => $request->input('payable_amount'),
            'remarks'                   => $request->input('remarks'),
            'societyMemberId'           => $request->input('societyMemberId'),
        ]);


        if (isset($request->year) && isset($request->month) && isset($request->monthlyDue)) {
            $totalMonthlyDue = 0;


            foreach ($request->year as $index => $year) {
                $month                  = $request->month[$index];
                $monthlyDue             = $request->monthlyDue[$index];
                $totalMonthlyDue        += $monthlyDue;

                GenerateBill::updateOrCreate(
                    [
                        'flat_id'           => $flat->id,
                        'year_id'           => $year,
                        'month_id'          => $month,
                    ],
                    [
                        'block_id'          => $flat->block_id,
                        'road_id'           => $flat->road_id,
                        'plot_id'           => $flat->plot_id,
                        'plotID'            => $flat->plotID,
                        'flats'             => $flat->flatID,
                        'units'             => $flat->unitName,
                        'usage_type_id'     => $flat->usage_type_id,
                        'usageType'         => $typeName,
                        'amount'            => $flat->payable_amount ?? $flat->amount,
                        'billingID'         => $year . '-' . $month . '-' . $flat->road_id . '-' . $flat->block_id,
                        'billNo'            => $this->generateUniqueBillNo($year, $month, $flat->road_id),
                        'usageTypeTitle'    => UsageType::where('id', $flat->usage_type_id)->value('title'),
                        'monthlyDue'        => $monthlyDue,
                    ]
                );
            }

            $flat->update([
                'totalDue'                  => $totalMonthlyDue,
            ]);
        }

        return redirect(route('flat.list'))->with('success', 'Flat Updated Successfully');
    }




















    public function delete($id)
    {
        try {
            $flat = Flat::findOrFail($id);

            if ($flat->totalDue > 0) {
                return back()->with('error', 'Unable to delete the flat as there are outstanding dues.');
            }

            $generateBills = GenerateBill::where('flat_id', $id)->get();

            if ($generateBills->isNotEmpty()) {
                foreach ($generateBills as $generateBill) {
                    $generateBill->delete();
                }
            }

            $flat->delete();

            return redirect(route('flat.list'))->with('success', 'Flat deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error', 'Unable to delete the flat as it is linked to other records.');
        } catch (\Exception $e) {
            return back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
}
