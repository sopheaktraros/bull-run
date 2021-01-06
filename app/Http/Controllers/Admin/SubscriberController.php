<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Http\Resources\SubscriberResource;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->Subscriber = new Subscriber;
    }

    public function index()
    {
        return view('admin.subscriber.index');
    }

    public function response(){
        $data = $this->Subscriber->get();
        
        $result = SubscriberResource::collection($data);

        return $result;
    }
    
    public function create()
    {
        return view('admin.subscriber.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        $subscriber = $request->all();
  
        $subscriber["created_by"] = getAuthID();

        $subscriber["logo"] = convertWebP($request->logo,'subscriber', []);

        $id = $this->Subscriber->create($subscriber)->id;

        return redirect('subscriber');
    }

    public function edit($id)
    {
        return view('admin.subscriber.edit')->with(
          ["subscriber" => $this->Subscriber->findOrFail($id)]
        );
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        $subscriberData = $request->all();

        $subscriber = $this->Subscriber->findOrFail($id);

        if($request->logo !== null){
            $subscriberData["logo"] = convertWebP($request->logo,'subscriber', []);
        }

        $subscriber->update($subscriberData);

        return redirect('subscriber');
    }

    
    public function destroy($id)
    {
        $subscriber = $this->Subscriber->findOrFail($id);

        $subscriberData["status"] = 'DISABLE';

        $subscriber->update($subscriberData);
        
        return redirect()->back();
    }
}
