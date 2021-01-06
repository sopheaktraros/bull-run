<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index');
    }

    public function response(){
        $data = Project::where('delete',"!=",1)->get();
        
        $result = ProjectResource::collection($data);

        return $result;
    }
    
    public function create()
    {
       
        return view('project.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'project_no' => 'required',
        ]);

        $project = $request->all();
  
        $project["created_by"] = getAuthID();

        Project::create($project);

        return redirect('project');
    }

    public function edit($id)
    {
        return view('project.edit')->with(
          ["project" => Project::findOrFail($id)]
        );
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'project_no' => 'required',
        ]);

        $projectData = $request->all();
        $projectData["updated_by"] = getAuthID();
        
        $project->update($projectData);

        return redirect('project');
    }

    
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        $projectData["delete"] = 1;

        $project->update($projectData);
        
        return redirect()->back();
    }
}
