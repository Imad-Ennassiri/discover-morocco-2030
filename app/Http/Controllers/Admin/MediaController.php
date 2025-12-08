<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::query()->latest();

        if ($request->has('city_id') && $request->city_id) {
            $cityId = $request->city_id;
            // Get media for the city AND its destinations
            $query->where(function($q) use ($cityId) {
                $q->where(function($sub) use ($cityId) {
                    $sub->where('mediable_type', 'App\Models\City')
                        ->where('mediable_id', $cityId);
                })->orWhere(function($sub) use ($cityId) {
                    $sub->where('mediable_type', 'App\Models\Destination')
                        ->whereHasMorph('mediable', ['App\Models\Destination'], function($q) use ($cityId) {
                            $q->where('city_id', $cityId);
                        });
                });
            });
        }

        if ($request->has('destination_id') && $request->destination_id) {
            $query->where('mediable_type', 'App\Models\Destination')
                  ->where('mediable_id', $request->destination_id);
        }

        $mediaItems = $query->get();

        // Separate collections for the view
        $cityImages = $mediaItems->where('mediable_type', 'App\Models\City')->where('file_type', 'image');
        $cityVideos = $mediaItems->where('mediable_type', 'App\Models\City')->where('file_type', 'video');
        $destinationImages = $mediaItems->where('mediable_type', 'App\Models\Destination')->where('file_type', 'image');
        $destinationVideos = $mediaItems->where('mediable_type', 'App\Models\Destination')->where('file_type', 'video');

        $cities = \App\Models\City::orderBy('nom')->get();
        // If a city is selected, only show its destinations
        $destinations = \App\Models\Destination::when($request->city_id, function($q) use ($request) {
            return $q->where('city_id', $request->city_id);
        })->orderBy('nom')->get();

        return view('admin.media.index', compact('cityImages', 'cityVideos', 'destinationImages', 'destinationVideos', 'cities', 'destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:51200', // 50MB max
            'model_type' => 'required|string',
            'model_id' => 'required|integer',
            'type' => 'required|in:image,video',
        ]);

        $modelClass = $request->model_type;
        if (!class_exists($modelClass)) {
            return back()->with('error', 'Invalid model type.');
        }
        
        $model = $modelClass::findOrFail($request->model_id);

        $path = $request->file('file')->store('media', 'public');

        $media = new Media();
        $media->file_path = $path;
        $media->file_type = $request->type;
        $media->mediable_type = $modelClass;
        $media->mediable_id = $model->id;
        $media->save();

        return back()->with('success', 'Media uploaded successfully.');
    }

    public function destroy(Media $media)
    {
        if (Storage::disk('public')->exists($media->file_path)) {
            Storage::disk('public')->delete($media->file_path);
        }
        $media->delete();

        return back()->with('success', 'Media deleted successfully.');
    }
}
