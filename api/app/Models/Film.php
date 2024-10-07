<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model implements ValidatableModel
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function screenings()
    {
        return $this->hasMany(Screening::class, 'film_id');
    }

    /**
     * @return string[]
     */
    public function getValidationRules(): array
    {
        return [
            'name' => 'required|string|max:128',
            'age_classification' => 'required|string|max:60',
            'language' => 'required|string|max:60',
            'cover_image' => 'required|string'
        ];
    }
}
