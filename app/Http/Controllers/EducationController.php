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
    public function update(Request $request, $id)
    {
        $education = Education::findOrFail($id);
        $validatedData = $request->validate([
            'portfolio_id' => 'string|max:255',
            'portfolio_id' => 'string|max:255',
            'degree' => 'string|max:20',
            'institution' => 'string|max:255',
            'institution' => 'string|max:255',
            'desc' => 'string|max:255',
            'desc' => 'string|max:255',

        ]);
        $education->update($validatedData);
        return response()->json(['message' => 'Portfolio updated successfully!', 'portfolio' => $education]);
    }
}
