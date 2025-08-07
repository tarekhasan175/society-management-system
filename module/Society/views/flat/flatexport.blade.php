<table>
    <thead>
        <tr>
            <th colspan="18" style="text-align: center;">
                <strong>Flats Report</strong><br>
                <strong>{{ $companies->name ?? 'Company Name' }}</strong><br>
                {{ $companies->head_office ?? 'Head Office Address' }}<br>
                Tel: {{ $companies->tel_number ?? 'Phone Number' }} | Email: {{ $companies->email ?? 'Email Address' }}
            </th>
        </tr>
        <tr>
            <th>Serial</th>
            <th>Flat ID</th>
            <th>Block Name</th>
            <th>Road Name</th>
            <th>Plot/House Name</th>
            <th>Storey</th>
            <th>Total Unit</th>
            <th>Flat Name</th>
            <th>Owner Name</th>
            <th>Owner Contact No</th>
            <th>Tenant Name</th>
            <th>Tenant Contact No</th>
            <th>Type Name</th>
            <th>Society Member ID</th>
            <th>Amount</th>
            <th>Total Due</th>
            <th>Advance</th>
            <th>Remarks</th>
        </tr>
    </thead>
    <tbody>
        @foreach($flats as $flat)
        <tr>
            <td>{{ $flat->serial ?? '' }}</td>
            <td>{{ $flat->flatID ?? '' }}</td>
            <td>{{ optional($flat->getblock)->blockName ?? '' }}</td>
            <td>{{ optional($flat->road)->roadName ?? '' }}</td>
            <td>{{ optional($flat->getplot)->plotName ?? '' }}</td>
            <td>{{ $flat->storey ?? '' }}</td>
            <td>{{ $flat->totalUnit ?? '' }}</td>
            <td>{{ $flat->flatName ?? '' }}</td>
            <td>{{ $flat->ownerName ?? '' }}</td>
            <td>{{ $flat->ownerContactNo1 ?? '' }}</td>
            <td>{{ $flat->tenantName ?? '' }}</td>
            <td>{{ $flat->tenantContactNo ?? '' }}</td>
            <td>{{ optional($flat->usagetype)->typeName ?? '' }}</td>
            <td>{{ $flat->societyMemberId ?? '' }}</td>
            <td>{{ $flat->amount ?? '' }}</td>
            <td>{{ $flat->totalDue ?? '' }}</td>
            <td>{{ $flat->advance ?? '' }}</td>
            <td>{{ $flat->remarks ?? '' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
