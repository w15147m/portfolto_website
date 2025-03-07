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
}
