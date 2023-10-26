<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'body', 
        'slug', 
        'published_at',
        'image',
        'link',
        'is_published',
        'is_online',
        'user_id',
        'category_id',
        'start_date',
        'end_date',
        'embed',
    ];

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
}
