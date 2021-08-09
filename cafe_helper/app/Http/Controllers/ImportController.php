<?php


namespace App\Http\Controllers;

use App\Models\Export\ExcelExport;
use App\Models\Import\ExcelImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    protected const TABLE = 'table';

    public function index()
    {
        return view('import');
    }

    public function process(Request $request): RedirectResponse
    {
        Excel::import(new ExcelImport($request->post(self::TABLE)), $request->file('file')->store('temp'));
        return back();
    }


}
