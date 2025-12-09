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

        // Get day-by-day activity data for the chart
        $activityData = $this->getDailyActivityData();

        // New Chart 1: Top 5 Cities by Destination Count
        $topCities = City::withCount('destinations')
            ->orderBy('destinations_count', 'desc')
            ->take(5)
            ->get();
        
        $topCitiesData = [
            'labels' => $topCities->pluck('nom'),
            'data' => $topCities->pluck('destinations_count'),
        ];

        // New Chart 2: Contact Status Distribution
        $contactStats = Contact::selectRaw('statut, count(*) as count')
            ->groupBy('statut')
            ->pluck('count', 'statut')
            ->toArray();
            
        $contactStatusData = [
            'traite' => $contactStats['traite'] ?? 0,
            'en_cours' => $contactStats['en_cours'] ?? 0,
            'non_lu' => $contactStats['non_lu'] ?? 0,
        ];

        return view('admin.dashboard', compact('stats', 'recent_activities', 'activityData', 'topCitiesData', 'contactStatusData'));
    }

    private function getDailyActivityData()
    {
        // Show last 5 days only
        $startDate = now()->subDays(4)->startOfDay(); // 4 days ago + today = 5 days
        $endDate = now()->startOfDay();

        // Get daily increments
        $citiesData = City::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->pluck('count', 'date')->toArray();

        $destinationsData = Destination::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->pluck('count', 'date')->toArray();

        $volontairesData = Volontaire::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->pluck('count', 'date')->toArray();

        $contactsData = Contact::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->pluck('count', 'date')->toArray();

        $commentairesData = Commentaire::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->pluck('count', 'date')->toArray();

        $newslettersData = Newsletter::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->pluck('count', 'date')->toArray();

        $labels = [];
        $cities = [];
        $destinations = [];
        $volontaires = [];
        $contacts = [];
        $commentaires = [];
        $newsletters = [];
        
        $currentDate = $startDate->copy();

        while ($currentDate <= $endDate) {
            $dateKey = $currentDate->format('Y-m-d');
            
            // Labels - Show all dates since we only have 5 days
            if ($currentDate->isToday()) {
                $labels[] = 'Today';
            } elseif ($currentDate->isYesterday()) {
                $labels[] = 'Yesterday';
            } else {
                $labels[] = $currentDate->format('M d');
            }
            
            // Daily increments ONLY (No running total)
            $cities[] = $citiesData[$dateKey] ?? 0;
            $destinations[] = $destinationsData[$dateKey] ?? 0;
            $volontaires[] = $volontairesData[$dateKey] ?? 0;
            $contacts[] = $contactsData[$dateKey] ?? 0;
            $commentaires[] = $commentairesData[$dateKey] ?? 0;
            $newsletters[] = $newslettersData[$dateKey] ?? 0;
            
            $currentDate->addDay();
        }

        return [
            'labels' => $labels,
            'content' => [
                'cities' => $cities,
                'destinations' => $destinations,
            ],
            'community' => [
                'volontaires' => $volontaires,
                'contacts' => $contacts,
                'commentaires' => $commentaires,
                'newsletters' => $newsletters,
            ],
        ];
    }
}


