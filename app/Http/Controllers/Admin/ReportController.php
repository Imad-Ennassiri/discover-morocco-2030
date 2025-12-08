<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\City;
use App\Models\Destination;
use App\Models\Volontaire;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Commentaire;

class ReportController extends Controller
{
    public function generate()
    {
        $stats = [
            'cities' => City::count(),
            'destinations' => Destination::count(),
            'volunteers' => Volontaire::count(),
            'contacts' => Contact::count(),
            'newsletters' => Newsletter::count(),
            'comments' => Commentaire::count(),
        ];

        $top_cities = City::withCount('destinations')
            ->orderBy('destinations_count', 'desc')
            ->take(5)
            ->get();

        $recent_contacts = Contact::latest()->take(3)->get();
        // Calculate some growth or comparative metrics
        // e.g. average destinations per city
        $avg_destinations = $stats['cities'] > 0 ? round($stats['destinations'] / $stats['cities'], 2) : 0;

        $data = [
            'date' => now()->format('d F Y'),
            'stats' => $stats,
            'top_cities' => $top_cities,
            'recent_contacts' => $recent_contacts,
            'avg_destinations' => $avg_destinations,
        ];

        $pdf = Pdf::loadView('admin.reports.pdf', $data);

        if (request()->has('download')) {
            return $pdf->download('rapport-officiel-morocco-2030.pdf');
        }
        
        return $pdf->stream('rapport-officiel-morocco-2030.pdf');
    }
}
