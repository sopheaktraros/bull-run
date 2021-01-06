<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Package;
use App\Http\Resources\PackageResource;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->Package = new Package;
    }

    public function index()
    {

        return view('admin.package.index');
    }

    public function response(){
        $data = $this->Package->where('id',"!=",1)->get();
        
        $result = PackageResource::collection($data);

        return $result;
    }
    
    public function create()
    {
       
        return view('admin.package.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'period' => 'required'
        ]);

        $package = $request->all();
  
        $package["created_by"] = getAuthID();

        $id = $this->Package->create($package)->id;

        DB::statement('insert into package_permissions(package_id,`name_en`, `name_kh`,`group`,`order`,control,icon,enable,`active`,`write`,`update`,`delete`,`viewable`) SELECT '.$id.',`name_en`, `name_kh`,`group`,`order`,control,icon,`enable`,`active`,`write`,`update`,`delete`,`viewable` from package_permissions where package_id = 1 order by `group` and `order`');

        return redirect('package');
    }

    public function edit($id)
    {
        return view('admin.package.edit')->with(
          ["package" => $this->Package->findOrFail($id)]
        );
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'period' => 'required'
        ]);

        $packageData = $request->all();
        if($request->lifetime == null){
            $packageData["lifetime"] = 0;
        }
        $package = $this->Package->findOrFail($id);
        
        $package->update($packageData);

        return redirect('package');
    }

    
    public function destroy($id)
    {
        $package = $this->Package->findOrFail($id);

        $packageData["status"] = 'DISABLE';

        $package->update($packageData);
        
        return redirect()->back();
    }
}
