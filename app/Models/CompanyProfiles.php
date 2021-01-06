<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfiles extends Model
{
    protected $fillable = [
        'name',
        'registration_no',
        'email',
        'phone',
        'address',
        'logo',
        'represented_by',
        'exchange_rate',
        'alert_before',
        'created_by'
    ];
}
