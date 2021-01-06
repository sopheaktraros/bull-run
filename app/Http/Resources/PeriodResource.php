<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PeriodResource extends JsonResource
{
    
    public function toArray($request)
    {
        $edit = "";
        if(hasPermission('period', 'update') == 1){
            $edit =	'<a href="'.route('period.edit',$this->id).'"><i class="fas fa-edit"></i></a>';
        }

        $delete = "";
        if(hasPermission('period', 'delete') == 1){
            $delete = '<a href="#" onclick="window.parent.remove(`'.route('period.delete',$this->id).'`)"><i class="fas fa-trash"></i></a>';
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'period' => $this->period,
            'rate' => $this->rate,
            'created_by' => getCreatedBy($this->created_by),
            'created_at' => date('d-m-Y', strtotime($this->created_at)),
            'edit' => $edit,
            'delete' => $delete
        ];
    }
}
