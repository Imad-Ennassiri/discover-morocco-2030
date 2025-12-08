<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Destination;
use App\Models\Volontaire;
use App\Models\Commentaire;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Activity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'cities' => City::count(),
            'destinations' => Destination::count(),
            'volontaires' => Volontaire::count(),
            'commentaires' => Commentaire::count(),
            'contacts' => Contact::count(),
            'newsletters' => Newsletter::count(),
        ];

        // Fetch recent activities from Activity log (tracks ALL changes)
        $recent_activities = Activity::with('subject')
            ->latest()
            ->take(10)
            ->get()
            ->map(function ($activity) {
                // Extract model name from subject_type
                $modelName = class_basename($activity->subject_type);
                
                // Map model names to friendly names
                $typeMap = [
                    'City' => 'City',
                    'Destination' => 'Destination',
                    'Volontaire' => 'Volunteer',
                    'Contact' => 'Contact',
                    'Commentaire' => 'Comment',
                    'Newsletter' => 'Newsletter',
                ];
                
                $activity->type = $typeMap[$modelName] ?? $modelName;
                $activity->message = $activity->description;
                
                return $activity;
            });

        return view('admin.dashboard', compact('stats', 'recent_activities'));
    }
}
