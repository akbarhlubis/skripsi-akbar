<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Create relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Create relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Create relationship with Registration
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // create scope for published
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
