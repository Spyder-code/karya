<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventWinner extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcement_id',
        'name',
        'title',
        'instagram',
        'grade',
    ];
}
