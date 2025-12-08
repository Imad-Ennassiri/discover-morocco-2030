<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volontaire;
use Illuminate\Http\Request;

class VolontaireController extends Controller
{
    public function index(Request $request)
    {
        $query = Volontaire::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nom', 'like', "%{$search}%")
                  ->orWhere('prenom', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('ville', 'like', "%{$search}%");
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

        $volontaires = $query->paginate(10)->withQueryString();

        return view('admin.volontaires.index', compact('volontaires'));
    }

    public function show(Volontaire $volontaire)
    {
        return view('admin.volontaires.show', compact('volontaire'));
    }

    public function edit(Volontaire $volontaire)
    {
        return view('admin.volontaires.edit', compact('volontaire'));
    }

    public function update(Request $request, Volontaire $volontaire)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'ville' => 'nullable|string|max:255',
            'disponibilite' => 'nullable|string',
            'competences' => 'nullable|string',
        ]);

        $volontaire->update($validated);

        return redirect()->route('admin.volontaires.index')
            ->with('success', 'Volunteer updated successfully.');
    }

    public function destroy(Volontaire $volontaire)
    {
        $volontaire->delete();
        return redirect()->route('admin.volontaires.index')
            ->with('success', 'Volunteer deleted successfully.');
    }
}
