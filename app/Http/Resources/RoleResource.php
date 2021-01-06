<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    
    public function toArray($request)
    {
        $edit = "";
        if(hasPermission('roles', 'update') == 1){
            $edit =	'<a href="'.route('roles.edit',$this->id).'"><i class="fas fa-edit"></i></a>';
        }

        $delete = "";
        if(hasPermission('roles', 'delete') == 1){
            $delete = '<a href="#" onclick="window.parent.remove(`'.route('roles.delete',$this->id).'`)"><i class="fas fa-trash"></i></a>';
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => date('d-m-Y', strtotime($this->created_at)),
            'edit' => $edit,
            'delete' => $delete
        ];
    }
}
