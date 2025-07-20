<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;


class SocialLinkController extends Controller
{
    public function portfolioEducation($portfolio_id)
    {
        $socialLink = SocialLink::where('portfolio_id', $portfolio_id)->get();
        return response()->json($socialLink);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'portfolio_id' => ['required','exists:users,id'],
            'platform' => 'required|string|max:255',
            'url' => 'required|string',
        ]);
        $socialLink = SocialLink::create($validatedData);
        return response()->json(['message' => 'SocialLink created successfully!', 'socialLink' => $socialLink]);
    }
    public function update(Request $request, $id)
    {
        $socialLink = SocialLink::findOrFail($id);
        $validatedData = $request->validate([
            'portfolio_id' => ['required','exists:users,id'],
            'platform' => 'string|max:250',
            'url' => 'required|string',
           

        ]);
   
        $socialLink->update($validatedData);
        return response()->json(['message' => 'SocialLink updated successfully!', 'socialLink' => $socialLink]);
    }
    public function destroy($id)
    {
        $socialLink = SocialLink::findOrFail($id);
        $socialLink->delete();

        return response()->json(['message' =>   'SocialLink: deleted successfully!']);
    }
}
