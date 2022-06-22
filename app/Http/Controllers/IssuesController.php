<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Issue;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Mail\IssuesRequestSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Imports\IssuesImport;
use Maatwebsite\Excel\Facades\Excel;

class IssuesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $data['users'] = User::all();

        return view('issues.list', $data);
    }

    public function store(Request $request)
    {
        
        $issue = new Issue();
        $issue->name = $request->name;
        $issue->phone = $request->phone;
        $issue->email = $request->email;
        $issue->building_number = $request->building_number;
        $issue->apartment_number = $request->apartment_number;
        $issue->msg = $request->message;
        $issue->user_id = Auth::user()->id;
        $issue->attachment = $request->attachment;
        $issue->save();

        \Mail::to($issue->email)->send(new IssuesRequestSubmitted($issue));

        return "Record is created Successfully";
    }

    public function importFromExcel(Request $request) 
    {

        //validte file 
        
        Excel::import(new IssuesImport, $request->excelFile);

        return "Data Imported Successfully";

    }


}
