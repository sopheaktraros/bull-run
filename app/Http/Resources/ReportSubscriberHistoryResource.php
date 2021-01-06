<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Subscriber;
use App\Models\Package;

class ReportSubscriberHistoryResource extends JsonResource
{
    
    public function toArray($request)
    {
        $subscriber = Subscriber::select('name')->where('id',$this->subscriber_id)->first();
        $package = Package::select('name')->where('id',$this->package_id)->first();
        return [
            'id' => $this->id,
            'subscriber' => $subscriber->name,
            'package' => $package->name,
            'price' => $this->price,
            'started' => date('d-m-Y', strtotime($this->started_date)),
            'due_date' => date('d-m-Y', strtotime($this->due_date)),
            'payment_status' => $this->payment_status,
            'status' => $this->status
        ];
    }
}
