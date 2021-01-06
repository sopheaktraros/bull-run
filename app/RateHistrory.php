<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateHistrory extends Model
{
    protected $table = 'rate_history';
    protected $fillable = ['buy_from', 'buy_to', 'sale_from', 'sale_to', 'created_at', 'updated_at', 'user_id', 'rate_id'];
}
