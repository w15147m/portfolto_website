<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    use ManageFiles;
    public function portfolioExperience($portfolio_id)
    {
        $experience = Experience::where('portfolio_id', $portfolio_id)->get();
        return response()->json($experience);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'portfolio_id' => ['required','exists:users,id'],
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:20',
            'start_date' => 'required|string|max:255',
            'end_date' => 'required|string|max:255',
            'desc' => 'string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'experience_' . $request->portfolio_id . '_' . time() . '.png' ;
             $path = 'portfolio/experience/';
            $this->uploadImg($path, $image, $filename);
            $validatedData['image'] = $path.$filename;
        }else{
            $validatedData['image'] = '';
        }


        
        $validatedData['start_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
        $validatedData['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));
        $experience = Experience::create($validatedData);
        return response()->json(['message' => 'Experience created successfully!', 'experience' => $experience]);
    }
    public function updateExperience(Request $request, $id)
    {

        $experience = Experience::findOrFail($id);
        $validatedData = $request->validate([
            'company' => 'string|max:20',
            'position' => 'required|string|max:255',
            'start_date' => 'string|max:255',
            'end_date' => 'string|max:255',
            'desc' => 'string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        if ($request->hasFile('image')) {
            if ($experience->image) {
                Storage::disk('public')->delete($experience->image);
            }
            $image = $request->file('image');
            $filename = 'experience_' . $experience->id . '.png' ;
            $path = 'portfolio/experience/';
            $this->uploadImg($path, $image, $filename);
            $validatedData['image'] = $path.$filename;
        }else{
            $validatedData['image'] = '';
        }



        $validatedData['start_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
        $validatedData['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));
        $experience->update($validatedData);
        return response()->json(['message' => 'Experience updated successfully!', 'experience' => $experience]);
    }
    public function update(Request $request, $id)
    {

        $experience = Experience::findOrFail($id);
        $validatedData = $request->validate([
            'company' => 'string|max:20',
            'position' => 'required|string|max:255',
            'start_date' => 'string|max:255',
            'end_date' => 'string|max:255',
            'desc' => 'string|max:255',

        ]);
        $validatedData['start_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
        $validatedData['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));
        $experience->update($validatedData);
        return response()->json(['message' => 'Experience updated successfully!', 'experience' => $experience]);
    }
    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        if ($experience->image) {
            Storage::disk('public')->delete($experience->image);
        }
        $experience->delete();

        return response()->json(['message' =>  'Experience deleted successfully!']);
    }

}
