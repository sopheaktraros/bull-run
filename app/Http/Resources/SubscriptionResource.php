<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Subscriber;
use App\Models\Package;

class SubscriptionResource extends JsonResource
{
    
    public function toArray($request)
    {

        $subscriber = Subscriber::select('name')->where('id',$this->subscriber_id)->first();
        $package = Package::select('name')->where('id',$this->package_id)->first();

        $edit = "";
        if(hasPermission('subscription', 'update') == 1){
            $edit =	'<a href="'.route('subscription.edit',$this->id).'"><i class="fas fa-edit"></i></a>';
        }

        $delete = "";
        if(hasPermission('subscription', 'delete') == 1){
            $delete = '<a href="#" onclick="window.parent.remove(`'.route('subscription.delete',$this->id).'`)"><i class="fas fa-trash"></i></a>';
        }

        return [
            'id' => $this->id,
            'subscriber' => $subscriber->name,
            'package' => $package->name,
            'price' => $this->price,
            'started_date' => date('d-m-Y', strtotime($this->started_date)),
            'due_date' => date('d-m-Y', strtotime($this->due_date)),
            'payment_status' => $this->payment_status == 'PAID' ? '<div class="badge badge-success">'.$this->payment_status.'</div>' : '<div class="badge badge-danger">'.$this->payment_status.'</div>',
            'status' => $this->status == 'ACTIVE' ? '<div class="badge badge-success">'.$this->status.'</div>' : '<div class="badge badge-danger">'.$this->status.'</div>',
            'edit' => $edit,
            'delete' => $delete
        ];
    }
}
