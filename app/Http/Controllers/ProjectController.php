<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Skill;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    use ManageFiles;
    public function portfolioProjects($portfolio_id)
    {
        $projects = Project::where('portfolio_id', $portfolio_id)->with('images')->get();
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
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $project = project::create($validatedData);
        if ($request->hasFile('images')) {
            $this->uploadImage($request->file('images'), $project->id);
        }
        $project->load('images');
        return response()->json(['message' => 'project updated successfully!', 'project' => $project]);
    }

    public function updateProject(Request $request, $id)
    {

        $project = Project::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'string|max:20',
            'desc' => 'string|max:255',
            'link' =>  'string|max:255',
            'images' => 'array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->has('image_t0_delete')) {
            $this->destroyImage($request->image_t0_delete);
        }
        if ($request->hasFile('images')) {
            $this->uploadImage($request->file('images'), $project->id);
        }
        $project->update($validatedData);
        $project->save();
        $project->load('images');
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
    private function uploadImage($imagesToUpload, $portfolio_id)
    {
        foreach ($imagesToUpload as $image) {
            $filename = 'project_' . $portfolio_id . '_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
             $path = 'portfolio/project/';
            $this->uploadImg($path, $image, $filename);
            $imageUrl = $path . $filename;
            ProjectImage::create([
                'projects_id' => $portfolio_id,
                'image' => $imageUrl,
            ]);
        }
    }
    private function destroyImage($imagesToDelete)
    {
        $imagesToDelete = explode(',', $imagesToDelete);
        foreach ($imagesToDelete as $imagePath) {
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            ProjectImage::where('image', $imagePath)->delete();
        }
    }
}
