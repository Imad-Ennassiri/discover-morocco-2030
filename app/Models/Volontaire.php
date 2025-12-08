<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogActivity;

class Volontaire extends Model
{
    use HasFactory, LogActivity;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'identite',
        'email',
        'telephone',
        'pays',
        'ville',
        'adresse',
        'ville_volontariat',
        'langues',
        'niveau_etudes',
        'competences',
        'disponibilite',
        'cv',
        'photo',
    ];

    protected $casts = [
        'langues' => 'array',
        'date_naissance' => 'date',
    ];
}
