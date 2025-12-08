<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index(Request $request)
    {
        $query = Newsletter::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('email', 'like', "%{$search}%");
        }

        // Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'oldest':
                    $query->oldest();
                    break;
                case 'email_asc':
                    $query->orderBy('email', 'asc');
                    break;
                case 'email_desc':
                    $query->orderBy('email', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $newsletters = $query->paginate(10)->withQueryString();

        return view('admin.newsletters.index', compact('newsletters'));
    }

    public function exportCsv()
    {
        $newsletters = Newsletter::orderBy('created_at', 'desc')->get();
        
        $filename = 'newsletter_emails_' . date('Y-m-d_His') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'no-cache, must-revalidate',
        ];

        $callback = function() use ($newsletters) {
            $file = fopen('php://output', 'w');
            
            // Add BOM for Excel UTF-8 support
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Add header row - just "Email"
            fputcsv($file, ['Email']);
            
            // Add email rows - just the email address
            foreach ($newsletters as $newsletter) {
                fputcsv($file, [$newsletter->email]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect()->route('admin.newsletters.index')
            ->with('success', 'Subscriber deleted successfully.');
    }
}
