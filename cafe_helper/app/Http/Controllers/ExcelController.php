<?php


namespace App\Http\Controllers;

use App\Models\Export\ExcelExport;
use App\Models\Import\ExcelImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    protected const TABLE = 'table';

    public function import(Request $request): RedirectResponse
    {
        Excel::import(new ExcelImport($request->post(self::TABLE)), $request->file('file')->store('temp'));
        return back();
    }

    public function export(Request $request)
    {
        return Excel::download(new ExcelExport($request->post(self::TABLE)), "Export_" . time() . '.xlsx');
    }



}
