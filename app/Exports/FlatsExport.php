<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Module\Society\Models\Flat;

class FlatsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Ensure all fields are selected except the 'id'
        $flats = Flat::all()->makeHidden(['id']);
        return $flats;
    }

    public function headings(): array
    {
        return [
            'Plot ID',
            'House or Building ID',
            'Flat ID',
            'Block Name',
            'Road Name',
            'Plot Name',
            'Plot Owner',
            'Storey',
            'Total Unit',
            'Remark',
            'Unit Name',
            'Flat Name',
            'Owner Name',
            'Owner Contact No 1',
            'Owner Contact No 2',
            'Owner Mail Address',
            'Owner Present Address',
            'Tenant Name',
            'Tenant Contact No',
            'Tenant Permanent Address',
            'Type Name',
            'Amount',
            'Remarks',
            'Society Member ID',
            'Total Due',
            'Advance',
            'Created At',
            'Updated At',
        ];
    }
}
