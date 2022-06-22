<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;




class UsersController extends Controller
{
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function importFromExcel(Request $request) 
    {
        Excel::import(new UsersImport, $request->excelFile);

        
        Alert::success('Data Imported Successfully', 'Will Done *_*!!');

         return back();
    }
}
