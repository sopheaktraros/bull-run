<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Role;

class StaffResource extends JsonResource
{
    
    public function toArray($request)
    {

        $role = Role::select('name')->where('id',$this->role_id)->pluck('name')->all();

        $edit = "";
        if(hasPermission('staff', 'update') == 1){
            $edit =	'<a href="'.route('staff.edit',$this->id).'"><i class="fas fa-edit"></i></a>';
        }

        $delete = "";
        if(hasPermission('staff', 'delete') == 1){
            $delete = '<a href="#" onclick="window.parent.remove(`'.route('staff.delete',$this->id).'`)"><i class="fas fa-trash"></i></a>';
        }

        return [
            'id' => $this->id,
            'role' => $role[0],
            'name' => $this->name,
            'gender' => $this->gender,
            'contact_number' => $this->contact_number,
            'address' => $this->address,
            'created_at' => date('d-m-Y', strtotime($this->created_at)),
            'edit' => $edit,
            'delete' => $delete
        ];
    }
}
