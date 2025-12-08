<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationParagraph extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'titre', 'contenu'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
