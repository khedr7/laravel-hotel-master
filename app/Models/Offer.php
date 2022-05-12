<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Offer extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'name',
    ];

    protected $fillable = [

        'name',
        'discount',
        'type',
        'started_at',
        'ended_at',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
