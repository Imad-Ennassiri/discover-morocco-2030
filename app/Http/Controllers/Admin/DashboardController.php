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
        // Always show last 30 days
        $startDate = now()->subDays(29)->startOfDay();
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
        $contentData = [];
        $engagementData = [];
        
        $currentDate = $startDate->copy();

        while ($currentDate <= $endDate) {
            $dateKey = $currentDate->format('Y-m-d');
            
            // Labels
            if ($currentDate->isToday()) {
                $labels[] = 'Today';
            } elseif ($currentDate->diffInDays($endDate) % 5 == 0) {
                // Show date every 5 days
                $labels[] = $currentDate->format('M d');
            } else {
                $labels[] = ''; // Empty label for spacing
            }
            
            // Daily increments ONLY (No running total)
            $contentToday = ($citiesData[$dateKey] ?? 0) + ($destinationsData[$dateKey] ?? 0);
            $engagementToday = ($volontairesData[$dateKey] ?? 0) + 
                              ($contactsData[$dateKey] ?? 0) + 
                              ($commentairesData[$dateKey] ?? 0) + 
                              ($newslettersData[$dateKey] ?? 0);

            $contentData[] = $contentToday;
            $engagementData[] = $engagementToday;
            
            $currentDate->addDay();
        }

        return [
            'labels' => $labels,
            'content' => $contentData,
            'engagement' => $engagementData,
        ];
    }
}
