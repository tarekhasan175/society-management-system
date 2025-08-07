<?php

namespace Module\Society\Imports;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Module\Society\Models\Flat;
use Module\Society\Models\Block;
use Module\Society\Models\Road;
use Module\Society\Models\UsageType;
use Module\Society\Models\Plot;
use Module\Society\Models\HouseOrBuilding;

class CSVImport implements ToModel, WithHeadingRow, WithCustomCsvSettings
{
    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'delimiter'      => ',',
        ];
    }

    public function model(array $row)
    {

        if (
            empty($row['block']) &&
            empty($row['rd']) &&
            empty($row['plot_name']) &&
            empty($row['h']) &&
            empty($row['flatName']) &&
            empty($row['total_unit']) &&
            empty($row['unit_no']) &&
            empty($row['owner']) &&
            empty($row['tenant']) &&
            empty($row['bs_member']) &&
            empty($row['remarks']) &&
            empty($row['totaldue'])
        ) {
            return null;
        }





        $blockName       = strtoupper($row['block'] ?? null);
        $roadName        = $row['rd'] ?? null;
        $plotName        = $row['plot_name'] ?? null;
        $houseName       = $row['h'] ?? null;
        $flatName        = $row['flatName'] ?? null;
        $totalUnits      = $row['total_unit'] ?? null;
        $unitName        = $row['unit_no'] ?? null;
        $owner           = $row['owner'] ?? null;
        $plotowner       = $row['plotowner'] ?? null;
        $tenant          = $row['tenant'] ?? null;
        $societyMemberId = $row['bs_member'] ?? null;
        $remarks         = $row['remarks'] ?? null;
        $totaldue        = $row['totaldue'] ?? null;
        $type            = null;

        if (($row['res'])) {
            $type = 'Residential';
        } elseif (($row['com'])) {
            $type = 'Commercial';
        } elseif (($row['uc'])) {
            $type = 'Under Construction (UC)';
        } elseif (($row['main_sponsor'])) {
            $type = 'Main Sponsor';
        } elseif (($row['mini_sponsor'])) {
            $type = 'Mini Sponsor';
        }

        $amount = $row['amount'] ?? null;

        $usageType = UsageType::updateOrCreate(
            ['typeName' => $type],
            ['amount' => $amount],
           
        );



        $usageType         = UsageType::where('typeName', $type)->first();
        $amount            = $usageType ? (float)$usageType->amount : null;
        $typeInitial       = $type ? strtoupper($type[0]) : 'U';

        $block_id          =  Block::updateOrCreate(
            ['blockName'    => $blockName],
            ['created_at'   => now(), 'updated_at' => now()]
        );

        $roadID             = "{$blockName}-{$roadName}";
        $road_id            =   Road::updateOrCreate(
            [
                'roadName'  => $roadName,
                'blockName' => $blockName
            ],
            [
                'roadID'                => $roadID,
                'block_name_id'         => $block_id->id,
                'moneyCollectorID'      => $row['money_collector_id'] ?? null,
                'moneyCollectorName'    => $row['money_collector_name'] ?? null,
                'created_at'            => now(),
                'updated_at'            => now()
            ]
        );

        $plotID = trim(implode('-', [
            $blockName ?: ' ',
            $roadName  ?: ' ',
            $houseName ?: ' '
        ]));

        $houseOrBuildingId = trim(implode('-', [
            $blockName ?: ' ',
            $roadName  ?: ' ',
            $houseName ?: ' ',
            $houseName ?: ' '
        ]));

        // $usage_type_id = UsageType::where('typeName', '=', $type)->pack('id');

        $plot_id                    =  Plot::updateOrCreate(
            [
                'plotID'        => $plotID,
                'road_id'       => $road_id->id,
                'block_id'      => $block_id->id,
            ],
            [
                'plotName'      => $plotName ?? $houseName,
                'storey'        => $row['storey'] ?? null,
                'totalFlat'     => $totalUnits,
                'roadID'        => $roadID,
                'roadName'      => $roadName,
                'block'         => $blockName,
                'ownername'     => $plotowner ?? null,
                'remarks'       => $remarks,
                'created_at'    => $row['created_at'] ?? now(),
                'updated_at'    => $row['updated_at'] ?? now(),
            ]
        );



        $hous_bulding_id                =  HouseOrBuilding::updateOrCreate(
            [
                'block_id'              => $block_id->id,
                'road_id'               => $road_id->id,
                'plot_id'               => $plot_id->id,
                'roadID'                => $roadID,
                'plotName'              => $plotName ?? $houseName,
                'plotID'                => $plotID,
                'usage_type_id'         => UsageType::where('typeName', '=', $type)->value('id'),
                'houseOrBuildingName'   => $houseName,
                'houseOrBuildingId'     => $houseOrBuildingId,
            ],
            [
                'storey'                => $row['storey'] ?? null,
                'totalFlat'             => $totalUnits,
                'houseStatus'           => UsageType::where('typeName', '=', $type)->value('id'),
                'created_at'            => $row['created_at'] ?? now(),
                'updated_at'            => $row['updated_at'] ?? now(),
            ]
        );

        $flatCount              = Flat::count();
        for ($i = 1; $i <= $totalUnits; $i++) {
            $nextSequence      = $flatCount + $i;
            $sequenceFormatted = str_pad($nextSequence, 4, '0', STR_PAD_LEFT);
            $flatID            = "{$typeInitial}-{$houseOrBuildingId}-{$sequenceFormatted}";


            // Update or create entry in `flats` table for each unit
          Flat::updateOrCreate(
                [
                    'block_id'          => $block_id->id,
                    'road_id'           => $road_id->id,
                    'plot_id'           => $plot_id->id,
                    // 'blockName'         => $blockName,
                    // 'roadName'          => $roadName,
                    // 'plotID'            => $plotID,
                    // 'flatID'            => $flatID,
                    'house_Building_id' => $hous_bulding_id->id,
                    'usage_type_id'     => UsageType::where('typeName', '=', $type)->value('id'),
                    'storey'            => $row['storey'] ?? null,
                    'totalUnit'         => $row['total_unit'] ?? null,
                    'unitName'          => $unitName,
                    'flatName'          => $unitName,
                    'plotName'          => $houseName,
                    'ownerName'         => $owner,
                    // 'typeName'       => $type,
                    'tenantName'        => $tenant,
                ],
                [
                    'blockName'      => $blockName,
                    'roadName'       => $roadName,
                    'plotID'         => $plotID,
                    'plotOwner'         => $owner,
                    // 'houseOrBuildingId' => $houseOrBuildingId,
                    // 'storey'         => $row['storey'] ?? null,
                    // 'totalUnit'      => $row['total_unit'] ?? null,
                    'remark'            => $row['remark'] ?? null,
                    // 'unitName'       => $unitName,
                    // 'flatName'       => $unitName,
                    'flatID'         => $flatID,
                    // 'plotName'       => $houseName,
                    // 'ownerName'      => $owner,
                    'ownerContactNo1'   => $row['owner_contact_no_1'] ?? null,
                    'ownerContactNo2'   => $row['owner_contact_no_2'] ?? null,
                    'ownerMailAddress'  => $row['owner_mail_address'] ?? null,
                    'ownerPresentAddress' => $row['owner_present_address'] ?? null,
                    // 'tenantName'     =>  $tenant,
                    'tenantContactNo'   => $row['tenant_contact_no'] ?? null,
                    'tenantPermanentAddress' => $row['tenant_permanent_address'] ?? null,
                    'typeName'          => $type,
                    'amount'            => $amount, // Ensure to cast to float
                    'remarks'           => $remarks,
                    'societyMemberId'   => $societyMemberId,
                    'totalDue'          => $totaldue,
                    'advance'           => isset($row['advance']) && is_numeric($row['advance']) ? (float)$row['advance'] : null,
                    'created_at'        => $row['created_at'] ?? now(), // Set default if null
                    'updated_at'        => $row['updated_at'] ?? now(), // Set default if null
                ]


            );

            // $existingPlot      = Plot::where('id', $plot_id)->first();  // Ensure you're using the correct plotID for each iteration
            // $ownerNames        = [];

            // // Check if existing plot was found
            // if ($existingPlot) {
            //     // If plot found, split existing owner names into an array
            //     if ($existingPlot->ownerName) {
            //         $ownerNames = explode(',', $existingPlot->ownerName);
            //     }

            //     // Add the new owner if not already present
            //     if ($owner && !in_array($owner, $ownerNames)) {
            //         $ownerNames[] = $owner;
            //     }

            //     // Combine the names into a comma-separated string
            //     $ownerNamesString = implode(',', $ownerNames);

            //     // Find the corresponding plot to update
            //     $plot = Plot::find($existingPlot->id);  // Use the correct plot ID here

            //     // Check if plot exists and update ownerName
            //     if ($plot && $plot->ownerName !== $ownerNamesString) {
            //         // Update the ownerName if it has changed
            //         $plot->update(['ownername' => $ownerNamesString]);
            //     }
            // } else {
            //     // Log if the plot was not found
            //     Log::error("Plot with plotID {$flatID} not found.");
            // }
        }
    }
}
