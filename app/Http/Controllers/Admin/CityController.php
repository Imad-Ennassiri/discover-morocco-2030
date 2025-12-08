<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CityCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $query = City::with(['categories', 'media']);

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nom', 'like', "%{$search}%")
                  ->orWhere('label', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by Category
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categorie', $request->category);
            });
        }

        // Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'oldest':
                    $query->oldest();
                    break;
                case 'name_asc':
                    $query->orderBy('nom', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('nom', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $cities = $query->paginate(10)->withQueryString();
        $available_categories = ['touristique', 'côtière', 'montagneuse', 'historique', 'culturelle', 'désertique'];

        if ($request->ajax()) {
            return view('admin.cities.partials.table', compact('cities'))->render();
        }

        return view('admin.cities.index', compact('cities', 'available_categories'));
    }

    public function create()
    {
        $available_categories = [
            'touristique', 'côtière', 'montagneuse', 'historique', 'culturelle', 'désertique'
        ];
        return view('admin.cities.create', compact('available_categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'size' => 'required|in:big,small',
            'description' => 'nullable|string',
            'label' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg|max:51200',
            'categories' => 'nullable|array',
            'categories.*' => 'in:touristique,côtière,montagneuse,historique,culturelle,désertique'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('cities/images', 'public');
            $validated['image'] = $path;
        }

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('cities/videos', 'public');
            $validated['video'] = $path;
        }

        $city = City::create($validated);

        if ($request->has('categories')) {
            foreach ($request->categories as $category) {
                CityCategory::create([
                    'city_id' => $city->id,
                    'categorie' => $category
                ]);
            }
        }

        return redirect()->route('admin.cities.index')
            ->with('success', 'City created successfully.');
    }

    public function show(City $city)
    {
        $city->load(['categories', 'destinations', 'media']);
        return view('admin.cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        $available_categories = [
            'touristique', 'côtière', 'montagneuse', 'historique', 'culturelle', 'désertique'
        ];
        $current_categories = $city->categories->pluck('categorie')->toArray();
        
        return view('admin.cities.edit', compact('city', 'available_categories', 'current_categories'));
    }

    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'size' => 'required|in:big,small',
            'description' => 'nullable|string',
            'label' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg|max:51200',
            'categories' => 'nullable|array',
            'categories.*' => 'in:touristique,côtière,montagneuse,historique,culturelle,désertique'
        ]);

        if ($request->hasFile('image')) {
            if ($city->image) Storage::disk('public')->delete($city->image);
            $validated['image'] = $request->file('image')->store('cities/images', 'public');
        }

        if ($request->hasFile('video')) {
            if ($city->video) Storage::disk('public')->delete($city->video);
            $validated['video'] = $request->file('video')->store('cities/videos', 'public');
        }

        $city->update($validated);

        // Sync categories
        $city->categories()->delete();
        if ($request->has('categories')) {
            foreach ($request->categories as $category) {
                CityCategory::create([
                    'city_id' => $city->id,
                    'categorie' => $category
                ]);
            }
        }

        return redirect()->route('admin.cities.index')
            ->with('success', 'City updated successfully.');
    }

    public function destroy(City $city)
    {
        if ($city->image) Storage::disk('public')->delete($city->image);
        if ($city->video) Storage::disk('public')->delete($city->video);
        $city->delete();

        return redirect()->route('admin.cities.index')
            ->with('success', 'City deleted successfully.');
    }
}
