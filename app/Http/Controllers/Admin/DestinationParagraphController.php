<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DestinationParagraph;
use App\Models\Destination;
use App\Models\City;
use Illuminate\Http\Request;

class DestinationParagraphController extends Controller
{
    public function index()
    {
        $paragraphs = DestinationParagraph::with('destination.city')->latest()->paginate(20);
        return view('admin.destination-paragraphs.index', compact('paragraphs'));
    }

    public function create()
    {
        $cities = City::orderBy('nom')->get();
        $destinations = Destination::with('city')->orderBy('nom')->get();
        return view('admin.destination-paragraphs.create', compact('destinations', 'cities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'titre' => 'nullable|string|max:255',
            'contenu' => 'required|string',
        ]);

        DestinationParagraph::create($validated);

        return redirect()->route('admin.destination-paragraphs.index')
            ->with('success', 'Destination paragraph created successfully.');
    }

    public function edit(DestinationParagraph $destinationParagraph)
    {
        $cities = City::orderBy('nom')->get();
        $destinations = Destination::with('city')->orderBy('nom')->get();
        return view('admin.destination-paragraphs.edit', compact('destinationParagraph', 'destinations', 'cities'));
    }

    public function update(Request $request, DestinationParagraph $destinationParagraph)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'titre' => 'nullable|string|max:255',
            'contenu' => 'required|string',
        ]);

        $destinationParagraph->update($validated);

        return redirect()->route('admin.destination-paragraphs.index')
            ->with('success', 'Destination paragraph updated successfully.');
    }

    public function destroy(DestinationParagraph $destinationParagraph)
    {
        $destinationParagraph->delete();

        return redirect()->route('admin.destination-paragraphs.index')
            ->with('success', 'Destination paragraph deleted successfully.');
    }
}
