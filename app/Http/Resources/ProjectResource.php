<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
        if(hasPermission('project', 'update') == 1){
            $edit =	'<a href="'.route('project.edit',$this->id).'"><i class="fas fa-edit"></i></a>';
        }

        $delete = "";
        if(hasPermission('project', 'delete') == 1){
            $delete = '<a href="#" onclick="window.parent.remove(`'.route('project.delete',$this->id).'`)"><i class="fas fa-trash"></i></a>';
        }

        return [
            'id' => $this->id,
            'project_no' => $this->project_no,
            'name' => $this->name,
            'created_by' => getCreatedBy($this->created_by),
            'created_at' => date('d-m-Y', strtotime($this->created_at)),
            'edit' => $edit,
            'delete' => $delete
        ];
    }
}
