<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Help extends Model
{

    protected $table = 'help';

    protected $fillable = [
        'description','kh_description','ch_description', 'updated_at', 'created_at','display','kh_display','ch_display'
    ];



}
