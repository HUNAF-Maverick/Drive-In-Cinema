<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string date
 * @property int available_seats
 * @property int film_id
 */
class Screening extends Model implements ValidatableModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'available_seats',
        'film_id'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date' => 'datetime:Y-m-d H:00',
            'available_seats' => 'integer',
            'film_id' => 'integer'
        ];
    }

    /**
     * @return string[]
     */
    public function getValidationRules(): array
    {
        return [
            'date' => 'required|datetime',
            'available_seats'=> 'required|integer',
            'film_id' => 'required|integer|exists:films,id'
        ];
    }

    /**
     * Prepare a date for array / JSON serialization.
     */
    protected function serializeDate(\DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @return Attribute
     */
    protected function filmId(): Attribute
    {
        return Attribute::make(
           get: fn(string $value) => Film::query()->findOrFail($value)?->name
        );
    }
}
