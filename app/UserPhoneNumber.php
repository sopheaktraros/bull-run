<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPhoneNumber extends Model
{

    protected $table = 'user_phones';

    protected $fillable = [
        'user_id', 'phone_number', 'trash'
    ];

}
