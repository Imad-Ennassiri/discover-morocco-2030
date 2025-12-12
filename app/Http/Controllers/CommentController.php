<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'prenom' => $validated['prenom'],
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'commentaire' => $validated['comment'],
        ];

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('comments', 'public');
        }

        Commentaire::create($data);

        return back()->with('success', 'Thank you for your comment!');
    }
}
