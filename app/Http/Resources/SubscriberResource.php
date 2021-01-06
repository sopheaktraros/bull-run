<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriberResource extends JsonResource
{
    
    public function toArray($request)
    {

        $image = '<img src="'.asset($this->logo).'" class="prev-img img-fluid">';

        $edit = "";
        if(hasPermission('subscriber', 'update') == 1){
            $edit =	'<a href="'.route('subscriber.edit',$this->id).'"><i class="fas fa-edit"></i></a>';
        }

        $delete = "";
        if(hasPermission('subscriber', 'delete') == 1){
            $delete = '<a href="#" onclick="window.parent.remove(`'.route('subscriber.delete',$this->id).'`)"><i class="fas fa-trash"></i></a>';
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'image' => $image,
            'status' => $this->status,
            'created_at' => date('d-m-Y', strtotime($this->created_at)),
            'edit' => $edit,
            'delete' => $delete
        ];
    }
}
