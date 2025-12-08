<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationCategory extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'categorie'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
