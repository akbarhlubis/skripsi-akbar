<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = ['event_id', 'user_id', 'barcode', 'num_tickets'];

    // Create relationship with Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Create relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
