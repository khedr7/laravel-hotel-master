<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomServiceRequest extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['room_service_id', 'room_id', 'reservation_id', 'employee_id', 'notes'];

    public function roomService()
    {
        return $this->belongsTo(Roomservice::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
