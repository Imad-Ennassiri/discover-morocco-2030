<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogActivity;

class Contact extends Model
{
    use HasFactory, LogActivity;

    protected $fillable = [
        'nom_prenom',
        'telephone',
        'email',
        'objet',
        'message',
        'statut',
    ];
}
