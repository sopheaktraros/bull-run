<?php

use Intervention\Image\Facades\Image;

function setting($name = null) {
	$settings = config('site.settings');

	if ( ! $name) {
		return $settings;
	}

	$setting = array_filter($settings->toArray(), function ($setting) use ($name) {
		return $setting['name'] == $name;
	});

	if ( ! $setting) {
		return null;
	}

	return array_shift($setting)['value'];
}

function uploadImage($requestFile, $path = 'images/') {
	$img = Image::make($requestFile);
	$imgPath = $path . uniqid() . '.png';
	$img->save($imgPath);

	return $imgPath;
}

function uploadResize($requestFile, $path = 'images', $resizeWidth) {
	$img = Image::make($requestFile)->fit($resizeWidth);
	$imgPath = public_path($path) . uniqid() . '.png';
	$img->save($imgPath);

	return $imgPath;
}

function showError($errors) {
	return '<p class="text-danger text-right">' . $errors . '</p>';
}

function user($field = null) {
	$user = config('auth.user');

	if ( ! $user) {
		return null;
	}

	if ( ! $field) {
		return config('auth.user');
	}

	if ($field == 'role') {
		return $user->role;
	}

	return $user->{$field};
}

function user_branch() {
	return request()->branch && has_permission('top-manager') ? request()->branch : user('branch_id');
}

/*
 * $file is your file is calling hasPermission method. You are always call this method on controller or view
 * $file has two values are "controller" and "view"
 */
function has_permission($permission, $file = 'controller') {
	$hasPermission = array_filter(user('role')->permissions->toArray(), function ($userPermission) use ($permission) {
		return $userPermission['keyword'] == $permission;
	});

	return count($hasPermission) > 0;
}

function money($amount = 0, $decimal = 2) {
	if (strpos($amount, '.')) {
		return rtrim(rtrim(number_format($amount, $decimal), '0'), '.');
	}

	return number_format($amount);
}

function to_float($amount) {
	return floatval(str_replace(',', '', $amount));
}

function active_language() {
    return session('active_language') ?? 'en';
}