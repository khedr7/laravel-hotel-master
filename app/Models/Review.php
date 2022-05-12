<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'name', 'job_title', 'rate', 'message'];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
