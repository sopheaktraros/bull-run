<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ReportSubscriberResource;
use App\Http\Resources\ReportSubscriberHistoryResource;
use App\Models\Subscriber;
use App\Models\Subscription;

class ReportSubscriberController extends Controller
{
    public function __construct(){
        $this->Subscriber = new Subscriber;
        $this->Subscription = new Subscription;
    }
    
    public function index()
    {
        return view('admin.report.report_subscriber.index')->with([
            "subscriber" => $this->Subscriber->get()
        ]);
    }

    public function response(){
        $data = $this->Subscriber->get();
        
        $result = ReportSubscriberResource::collection($data);

        return $result;
    }

    public function history($id){
        return view('admin.report.report_subscriber_history.index')->with([
            "id" => $id
        ]);
    }

    public function responseHistory($id){
        $data = $this->Subscription->where('subscriber_id',$id)->get();

        $result = ReportSubscriberHistoryResource::collection($data);

        return $result;
    }

    public function responseSearch(Request $request){
        $df = $request->df;
        $dt = $request->dt;
        $subscriber = $request->subscriber;
        $contact = $request->contact;

        $query = " date_format(created_at,'%Y-%m-%d') between '".$df."' and '".$dt."'";

        if($subscriber != "0"){
            $query .= ' and id = '.$subscriber;
        }

        if($contact != null){
            $query .= ' and phone like "%'.$subscriber.'%"';
        }

        $data = $this->Subscriber->whereRaw($query)->get();

        $result = ReportSubscriberResource::collection($data);

        return $result;
    }

    public function responseSearchHistory(Request $request){
        $df = $request->df;
        $dt = $request->dt;
        $id = $request->id;

        $data = $this->Subscription->whereRaw('subscriber_id = '.$id.' and date_format(started_date,"%Y-%m-%d") between ? and ?', [$df, $dt])->get();

        $result = ReportSubscriberHistoryResource::collection($data);

        return $result;
    }
}
