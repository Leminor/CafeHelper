<?php


namespace App\Http\Controllers;


use App\Models\Export\ExcelExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    protected const TABLE = 'table';

    public function index()
    {
       return view('export');
    }

    public function process(Request $request)
    {
        return Excel::download(new ExcelExport($request->post(self::TABLE)), "Export_" . time() . '.xlsx');
    }
}
