<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Periods;

use App\Http\Resources\PeriodResource;

class PeriodController extends Controller
{
    public function index()
    {

        return view('period.index');
    }

    public function response(){
        $data = Periods::where('delete',"!=",1)->get();
        
        $result = PeriodResource::collection($data);

        return $result;
    }
    
    public function create()
    {
       
        return view('period.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'period' => 'required',
            'rate' => 'required'
        ]);

        $period = $request->all();
  
        $period["created_by"] = getAuthID();

        Periods::create($period);

        return redirect('period');
    }

    public function edit($id)
    {
        return view('period.edit')->with(
          ["period" => Periods::findOrFail($id)]
        );
    }

    public function update(Request $request, $id)
    {
        $period = Periods::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'period' => 'required',
            'rate' => 'required'
        ]);

        $periodData = $request->all();
        $periodData["updated_by"] = getAuthID();
        
        $period->update($periodData);

        return redirect('period');
    }

    
    public function destroy($id)
    {
        $period = Periods::findOrFail($id);

        $periodData["delete"] = 1;

        $period->update($periodData);
        
        return redirect()->back();
    }
}
