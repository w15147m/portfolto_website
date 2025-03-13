<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    use ManageFiles;
    public function portfolioProjects($portfolio_id)
    {
        $projects = Project::where('portfolio_id', $portfolio_id)->get();
        if ($projects->isEmpty()) {
            return response()->json(['message' => 'No portfolio found'], 404);
        }
        return response()->json($projects);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:20',
            'portfolio_id' => 'required|exists:portfolios,id',
            'desc' => 'string|max:255',
            'link' =>  'string|max:255',

        ]);

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = 'project_' . $request->portfolio_id . '_' . time() . '.png' ;
        //      $path = 'portfolio/project/';
        //     $this->uploadImg($path, $image, $filename);
        //     $validatedData['image'] = $path.$filename;
        // }else{
        //     $validatedData['image'] = '';
        // }
        $project = project::create($validatedData);
        return response()->json(['message' => 'project updated successfully!', 'project' => $project]);
    }
    
    public function updateProject(Request $request, $id)
    {

        $project = Project::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'string|max:20',
            'desc' => 'string|max:255',
            'link' =>  'string|max:255',
        ]);
        // if ($request->hasFile('image')) {
        //     if ($project->image) {
        //         Storage::disk('public')->delete($project->image);
        //     }
        //     $image = $request->file('image');
        //     $filename = 'project_' . $project->id . '.png' ;
        //     $path = 'portfolio/project/';
        //     $this->uploadImg($path, $image, $filename);
        //     $validatedData['image'] = $path.$filename;
        // }else{
        //     $validatedData['image'] = '';
        // }

        $project->update($validatedData);
        return response()->json(['message' => 'project updated successfully!', 'project' => $project]);
    }
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return response()->json(['message' =>  'project deleted successfully!']);
    }
}
