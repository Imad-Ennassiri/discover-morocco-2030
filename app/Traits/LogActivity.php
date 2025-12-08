<?php

namespace App\Traits;

use App\Models\Activity;

trait LogActivity
{
    protected static function bootLogActivity()
    {
        static::created(function ($model) {
            $model->logActivity('created', "New " . class_basename($model) . " created: " . $model->name_for_activity);
        });

        static::updated(function ($model) {
            $model->logActivity('updated', class_basename($model) . " updated: " . $model->name_for_activity);
        });

        static::deleted(function ($model) {
            $model->logActivity('deleted', class_basename($model) . " deleted: " . $model->name_for_activity);
        });
    }

    public function logActivity($action, $description)
    {
        Activity::create([
            'subject_type' => get_class($this),
            'subject_id' => $this->id,
            'action' => $action,
            'description' => $description,
        ]);
    }

    public function getNameForActivityAttribute()
    {
        // Default to 'nom' or 'name' or 'title' or 'id'
        return $this->nom ?? $this->name ?? $this->title ?? $this->titre ?? $this->nom_prenom ?? $this->email ?? '#' . $this->id;
    }
}
