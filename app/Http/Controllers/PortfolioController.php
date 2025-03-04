<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // Display a list of portfolios
    public function index()
    {
        $portfolios = Portfolio::with(['user', 'education', 'skills', 'services', 'projects', 'socialLinks'])->get();
        return response()->json($portfolios);
    }

    // Show a single portfolio
    public function show($id)
    {
        $portfolio = Portfolio::with(['user', 'education', 'skills', 'services', 'projects', 'socialLinks'])->findOrFail($id);
        return response()->json($portfolio);
    }

    // Store a new portfolio
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
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
