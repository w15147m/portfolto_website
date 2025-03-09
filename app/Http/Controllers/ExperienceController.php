<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function portfolioExperience($portfolio_id)
    {
        $experience = Experience::where('portfolio_id', $portfolio_id)->get();
        if ($experience->isEmpty()) {
            return response()->json(['message' => 'No portfolio found'], 404);
        }
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
        $validatedData['start_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
        $validatedData['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));
        $experience = Experience::create($validatedData);
        return response()->json(['message' => 'Experience created successfully!', 'experience' => $experience]);
    }
    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);
        $validatedData = $request->validate([
            'portfolio_id' => ['required','exists:users,id'],
            'company' => 'string|max:20',
            'position' => 'required|string|max:255',
            'start_date' => 'string|max:255',
            'end_date' => 'string|max:255',
            'desc' => 'string|max:255',

        ]);
        $validatedData['start_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
        $validatedData['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));
        $experience->update($validatedData);
        return response()->json(['message' => 'Experience updated successfully!', 'portfolio' => $experience]);
    }
    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return response()->json(['message' =>  'Experience deleted successfully!']);
    }

}
