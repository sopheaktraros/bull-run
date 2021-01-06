<?php

namespace App\Http\Controllers;

use App\Menu;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Controller constructor.
	 */
	public function __construct() {
		// $this->middleware(function ($request, $next) {
		// 	config(['auth.user' => User::with('role', 'role.permissions')->find(auth()->user()->id)]);

		// 	view()->share('menus', Menu::with('children', 'permission', 'permission.roles')->whereHas('permission.roles', function ($q) {
		// 		$q->where('id', user('role_id'));
		// 	})->active()->parent()->orderBy('default_order', 'ASC')->orderBy('name', 'ASC')->get());

		// 	return $next($request);
		// });
	}
}
