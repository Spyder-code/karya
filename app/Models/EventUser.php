<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;

    protected $fillable = ['users_id','event_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class,'event_id');
    }
}
