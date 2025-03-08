<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    
    public function portfolioEducation($portfolio_id)
    {
        $education = Education::where('portfolio_id', $portfolio_id)->get();
        if ($education->isEmpty()) {
            return response()->json(['message' => 'No portfolio found'], 404);
        }
        return response()->json($education);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'portfolio_id' => ['required','exists:users,id'],
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:20',
            'field_of_study' => 'required|string|max:255',
            'start_date' => 'required|string|max:255',
            'end_date' => 'required|string|max:255',
            'desc' => 'string|max:255',
        ]);
        $validatedData['start_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
        $validatedData['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));
        $education = Education::create($validatedData);
        return response()->json(['message' => 'education created successfully!', 'education' => $education]);
    }
    public function update(Request $request, $id)
    {
        $education = Education::findOrFail($id);
        $validatedData = $request->validate([
            'portfolio_id' => ['required','exists:users,id'],
            'degree' => 'string|max:20',
            'field_of_study' => 'required|string|max:255',
            'institution' => 'string|max:255',
            'start_date' => 'string|max:255',
            'end_date' => 'string|max:255',
            'desc' => 'string|max:255',

        ]);
        $validatedData['start_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
        $validatedData['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));
        $education->update($validatedData);
        return response()->json(['message' => 'Education updated successfully!', 'portfolio' => $education]);
    }
    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return response()->json(['message' =>   $education->degree.': deleted successfully!']);
    }
}
