<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone_number',
        'national_id',
        'salary',
        'country',
        'email',
        'password',
        'country',
        'national_id',
        'phone',
        'salary',
        'job_title',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'customer_id');
    }

    /**
     * Get all of the messages for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function requests()
    {
        return $this->hasMany(RoomServiceRequest::class, 'customer_id');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('profile')
            ->useFallbackUrl('https://ui-avatars.com/api/?background=random&size=128&color=fff&name=' . $this->name)
            ->singleFile();
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'billable');
    }
}
