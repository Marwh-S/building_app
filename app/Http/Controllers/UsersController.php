<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function importFromExcel(Request $request) 
    {
        Excel::import(new UsersImport, $request->excelFile);
        
        return "Data Imported Successfully";
    }
}
