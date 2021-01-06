<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfiles;

class GeneralController extends Controller
{

    public function index(){
        return view('general_setting.index')->with([
            'profile' => CompanyProfiles::find(1)
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'registration_no' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'represented_by' => 'required',
            'alert_before' => 'required'
        ]);

        $data = $request->all();

        if($request->logo){
            $data["logo"] = convertWebP($request->logo,'company_profiles', []);
        }
        
        
        $company = CompanyProfiles::findOrFail(1);
        
        $company->update($data);

        return redirect('general_setting');
    }
}
