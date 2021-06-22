<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'note',
        'jury_note',
        'jury_note',
        'status'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
