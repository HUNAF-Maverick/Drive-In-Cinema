<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'age_classification',
        'language',
        'cover_image'
    ];


    public function screenings()
    {
        return $this->hasMany(Screening::class, 'film_id');
    }
}
