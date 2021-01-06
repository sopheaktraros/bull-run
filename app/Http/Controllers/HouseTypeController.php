<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HouseType;
use App\Http\Resources\HouseTypeResource;

class HouseTypeController extends Controller
{
    public function index()
    {
        return view('house_type.index');
    }

    public function response(){
        // $data = HouseType::where('delete',"!=",1)->get();
        $data = HouseType::all();
        
        $result = HouseTypeResource::collection($data);

        return $result;
    }
    
    public function create()
    {
       
        return view('house_type.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $houseType = $request->all();
  
        $houseType["created_by"] = getAuthID();

        HouseType::create($houseType);

        return redirect('house_types');
    }

    public function edit($id)
    {
        return view('house_type.edit')->with(
          ["house_type" => HouseType::findOrFail($id)]
        );
    }

    public function update(Request $request, $id)
    {
        $houseType = HouseType::findOrFail($id);
        $request->validate([
            'name' => 'required'
        ]);

        $houseTypeData = $request->all();
        $houseTypeData["updated_by"] = getAuthID();
        
        $houseType->update($houseTypeData);

        return redirect('house_types');
    }

}