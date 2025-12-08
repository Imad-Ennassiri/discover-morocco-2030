<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\City;
use App\Models\Destination;
use App\Models\Volontaire;
use App\Models\Contact;
use App\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share recent activities with the admin layout
        View::composer('layouts.admin', function ($view) {
            $recent_activities = Activity::latest()->take(10)->get()->map(function ($activity) {
                // Format the message based on action
                $action_text = match($activity->action) {
                    'created' => 'New ' . class_basename($activity->subject_type) . ' added',
                    'updated' => class_basename($activity->subject_type) . ' updated',
                    'deleted' => class_basename($activity->subject_type) . ' deleted',
                    default => 'Activity'
                };
                
                $activity->message = $activity->description ?? $action_text;
                $activity->type = class_basename($activity->subject_type);
                return $activity;
            });

            $view->with('global_recent_activities', $recent_activities);
        });
    }
}
