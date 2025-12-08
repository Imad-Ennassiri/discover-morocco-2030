<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogActivity;

class Commentaire extends Model
{
    use HasFactory, LogActivity;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'commentaire',
        'photo',
    ];
}
