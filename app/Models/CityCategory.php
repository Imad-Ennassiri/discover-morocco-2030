<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityCategory extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'categorie'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
