<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Subscriber;
use App\Models\Package;

class ReportArResource extends JsonResource
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
            'started_date' => date('d-m-Y', strtotime($this->started_date)),
            'due_date' => date('d-m-Y', strtotime($this->due_date)),
            'payment_status' => $this->payment_status == 'PAID' ? '<div class="badge badge-success">'.$this->payment_status.'</div>' : '<div class="badge badge-danger">'.$this->payment_status.'</div>',
            'status' => $this->status == 'ACTIVE' ? '<div class="badge badge-success">'.$this->status.'</div>' : '<div class="badge badge-danger">'.$this->status.'</div>',
        ];
    }
}
