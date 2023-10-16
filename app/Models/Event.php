<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'body', 'slug', 'published_at'];

    // Create relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
