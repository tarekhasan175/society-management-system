<?php

namespace Module\Society\Controllers;

use App\Exports\FlatsExport;
use Illuminate\Http\Request;
use Module\Society\Models\Flat;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Module\Society\Imports\CSVImport;
use Illuminate\Http\Response;

class CsvUploadController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt,xlsx',
        ]);

        Excel::import(new CSVImport(), $request->file('csv_file'));

        return back()->with('success', 'CSV imported successfully!');
    }

    public function downloadCSV()
    {
        return Excel::download(new FlatsExport, 'flats.csv');
    }


    public function downloadSampleCsv()
    {
        $filePath = public_path('csv/flats.csv');

        if (file_exists($filePath)) {
            return response()->download($filePath, 'flats.csv', [
                'Content-Type' => 'text/csv',
            ]);
        }

        return redirect()->back()->with('error', 'File not found!');
    }
}
