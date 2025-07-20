<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Traits\ManageFiles;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\select;

class SkillController extends Controller
{
    use ManageFiles;
    public function portfolioSkills($portfolio_id)
    {
        $skill = Skill::where('portfolio_id', $portfolio_id)->get();
        return response()->json($skill);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:20',
            'portfolio_id' => 'required|exists:portfolios,id',
            'proficiency' => 'required|string|max:255',
            'desc' => 'string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'skill_' . $request->portfolio_id . '_' . time() . '.png' ;
             $path = 'portfolio/skill/';
            $this->uploadImg($path, $image, $filename);
            $validatedData['image'] = $path.$filename;
        }else{
            $validatedData['image'] = '';
        }
        $skill = Skill::create($validatedData);
        return response()->json(['message' => 'Skill updated successfully!', 'skill' => $skill]);
    }
    
    public function updateSkill(Request $request, $id)
    {

        $skill = Skill::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'string|max:20',
            'proficiency' => 'required|string|max:255',
            'desc' => 'string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        if ($request->hasFile('image')) {
            if ($skill->image) {
                Storage::disk('public')->delete($skill->image);
            }
            $image = $request->file('image');
            $filename = 'skill_' . $skill->id . '.png' ;
            $path = 'portfolio/skill/';
            $this->uploadImg($path, $image, $filename);
            $validatedData['image'] = $path.$filename;
        }else{
            $validatedData['image'] = '';
        }

        $skill->update($validatedData);
        return response()->json(['message' => 'Skill updated successfully!', 'skill' => $skill]);
    }
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        if ($skill->image) {
            Storage::disk('public')->delete($skill->image);
        }
        $skill->delete();
        return response()->json(['message' =>  'Skill deleted successfully!']);
    }
}
