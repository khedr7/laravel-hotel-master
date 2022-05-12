<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'email',
        'content',
        'type',
        'user_id'
    ];

    public $translatable = [
        'title',
        'content',
        'type'
    ];
}
