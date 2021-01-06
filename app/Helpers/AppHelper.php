<?php 


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPermissions;
use App\Models\Subscriber\Receipt;
use App\Models\Subscriber\Customer;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

use WebPConvert\WebPConvert;

function hasPermission($control,$type = 'write')
{
	
	if(! Auth::check()) {
		return false;
	}

	$role = session('role_id');
	if ( ! $role) {
		return false;
	}
	
	$request = new Request;
	
	$permission = UserPermissions::where(["route" => $control,"role_id" => session('role_id')])->pluck($type)->all();

	return $permission[0];

}

function uploadImages($requestFile, $path)
{

    $format = $requestFile->getClientOriginalExtension();
    $img = Image::make($requestFile)->encode($format, 50);
    $imgPath = 'images/'.$path .'/'. uniqid() . '.'.$format;
    $img->save($imgPath, 50);

    return $imgPath;
}

function getAuthID(){
	return Auth::id();
}

function getCreatedBy($id){
	return User::find($id)->name;
}


function convertWebP($source, $folder, $options){

	$imgPath = uploadImages($source,$folder);
	$des = $imgPath.'.webp';
	
	WebPConvert::convert($imgPath, $des, $options);

	File::delete($imgPath);

	return $des;
}

function uploadDocument($requestFile, $path){
	$uniqueFileName = uniqid() .'.'. $requestFile->getClientOriginalExtension();
	
	$requestFile->move(
        base_path() . '/' .$path, $uniqueFileName
    );

	return $path.'/'.$uniqueFileName;
}

?>