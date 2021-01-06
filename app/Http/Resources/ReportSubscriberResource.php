<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportSubscriberResource extends JsonResource
{
    
    public function toArray($request)
    {
        $view = '<a href="'.route('report_subscriber.history',$this->id).'"><i class="fas fa-eye"></i></a>';
        $image = '<img src="'.asset($this->logo).'" class="prev-img img-fluid">';

        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'image' => $image,
            'status' => $this->status,
            'created_at' => date('d-m-Y', strtotime($this->created_at)),
            'view' => $view
        ];
    }
}
