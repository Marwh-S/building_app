<?php

namespace App\Imports;

use App\Issue;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Auth;

class IssuesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Issue([
            'name'     => $row[0],
            'phone'    => $row[1],
            'email'    => $row[2], 
            'building_number'    => $row[3],
            'apartment_number'    => $row[4],
            'msg'    => $row[5], 
            'user_id'    => Auth::user()->id, 
        ]);  
    }
}
