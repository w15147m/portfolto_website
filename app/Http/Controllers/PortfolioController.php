<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // Display a list of portfolios
    public function index()
    {
      
        $portfolios = Portfolio::where('user_id', 1)
            ->with(['user', 'education', 'skills', 'services', 'projects', 'socialLinks'])
            ->first();
        // return $portfolios;
            return view('portfolioThemes.theme', compact('portfolios'));
    }

    // Show a single portfolio
    public function userPortfolio($user_id)
    {
        $portfolio = Portfolio::where('user_id', $user_id) ->with(['user', 'education', 'skills', 'services', 'projects', 'socialLinks'])->get();
        if ($portfolio->isEmpty()) {
            return response()->json(['message' => 'No portfolio found'], 404);
        }
        return response()->json($portfolio);
    }
    public function show($id)
    {
        $portfolio = Portfolio::with(['user', 'education', 'skills', 'services', 'projects', 'socialLinks'])->findOrFail($id);
        return response()->json($portfolio);
    }

    // Store a new portfolio
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->merge(['user_id' => $user->id]);
        $validatedData = $request->validate([
            'user_id' => [
                'required',
                'exists:users,id',
                function ($attribute, $value, $fail) use ($user) {
                    // Use the method from the User model
                    if ($user->portfolioExists()) {
                        $fail('Portfolio already exists for this user.');
                    }
                },
            ],
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'image' => 'required|string|max:255',
        ]);

        $portfolio = Portfolio::create($validatedData);

        return response()->json(['message' => 'Portfolio created successfully!', 'portfolio' => $portfolio]);
    }

    // Update an existing portfolio
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'number' => 'string|max:20',
            'address' => 'string|max:255',
            'image' => 'string|max:255',
        ]);

        $portfolio->update($validatedData);

        return response()->json(['message' => 'Portfolio updated successfully!', 'portfolio' => $portfolio]);
    }

    // Delete a portfolio
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return response()->json(['message' => 'Portfolio deleted successfully!']);
    }
}
