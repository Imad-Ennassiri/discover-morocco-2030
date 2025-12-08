<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CityParagraph;
use App\Models\City;
use Illuminate\Http\Request;

class CityParagraphController extends Controller
{
    public function index()
    {
        $paragraphs = CityParagraph::with('city')->latest()->paginate(20);
        return view('admin.city-paragraphs.index', compact('paragraphs'));
    }

    public function create()
    {
        $cities = City::orderBy('nom')->get();
        return view('admin.city-paragraphs.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'city_id' => 'required|exists:cities,id',
            'titre' => 'nullable|string|max:255',
            'contenu' => 'required|string',
        ]);

        CityParagraph::create($validated);

        return redirect()->route('admin.city-paragraphs.index')
            ->with('success', 'City paragraph created successfully.');
    }

    public function edit(CityParagraph $cityParagraph)
    {
        $cities = City::orderBy('nom')->get();
        return view('admin.city-paragraphs.edit', compact('cityParagraph', 'cities'));
    }

    public function update(Request $request, CityParagraph $cityParagraph)
    {
        $validated = $request->validate([
            'city_id' => 'required|exists:cities,id',
            'titre' => 'nullable|string|max:255',
            'contenu' => 'required|string',
        ]);

        $cityParagraph->update($validated);

        return redirect()->route('admin.city-paragraphs.index')
            ->with('success', 'City paragraph updated successfully.');
    }

    public function destroy(CityParagraph $cityParagraph)
    {
        $cityParagraph->delete();

        return redirect()->route('admin.city-paragraphs.index')
            ->with('success', 'City paragraph deleted successfully.');
    }
}
