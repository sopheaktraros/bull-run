<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HouseTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $edit = "";
        if(hasPermission('house_types', 'update') == 1){
            $edit =	'<a href="'.route('house_types.edit',$this->id).'"><i class="fas fa-edit"></i></a>';
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_by' => getCreatedBy($this->created_by),
            'created_at' => date('d-m-Y', strtotime($this->created_at)),
            'edit' => $edit
        ];
    }
}
