<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

	protected $guard = 'admin';
    
	protected $fillable = [
		'role_id',
		'name',
		'gender',
		'phone_number',
		'username',
		'password',
		'remember_token',
		'created_by',
		'updated_by',
		'status',
		'deleted'
	];

	protected $hidden = [
		'password', 'remember_token',
	];
}
