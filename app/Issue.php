<?php

namespace App;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'name',
        'phone', 
        'email',
        'building_number',
        'apartment_number',
        'msg',
        'user_id',
     ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
