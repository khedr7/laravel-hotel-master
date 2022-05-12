<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Room extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    public $translatable = ['description', 'status'];
    protected $fillable = [
        'number',
        'beds',
        'price',
        'story',
        'description',
        'status',
        'room_type_id'];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class,'room_type_id');
    }

    public function roomServiceRequests()
    {
        return $this->hasMany(RoomServiceRequests::class);
    }


    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
