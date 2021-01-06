<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ReportArResource;
use App\Http\Resources\ReportSubscriberHistoryResource;
use App\Models\Subscriber;
use App\Models\Subscription;

class ReportARController extends Controller
{
    public function __construct(){
        $this->Subscriber = new Subscriber;
        $this->Subscription = new Subscription;
    }
    
    public function index()
    {
        return view('admin.report.report_ar.index')->with([
            "subscriber" => $this->Subscriber->get()
        ]);
    }

    public function response(Request $request){
        $data = $this->Subscription->paid()->get();
        $result = ReportArResource::collection($data);
        return $result;
    }

    public function responseSearch(Request $request){
        $df = $request->df;
        $dt = $request->dt;
        $subscriber = $request->subscriber;

        $query = " date_format(created_at,'%Y-%m-%d') between '".$df."' and '".$dt."'";

        if($subscriber != "0"){
            $query .= ' and subscriber_id = '.$subscriber;
        }

        $data = $this->Subscription->whereRaw($query)->paid()->get();

        $result = ReportArResource::collection($data);

        return $result;
    }
}
