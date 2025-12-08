<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogActivity;

class Newsletter extends Model
{
    use HasFactory, LogActivity;

    protected $fillable = [
        'email',
    ];
}
