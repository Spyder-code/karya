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
        'email',
        'title',
        'instagram',
        'grade',
        'institution',
        'sertif_name',
        'sertif_status',
    ];

    public function announcement()
    {
        return $this->hasMany(Announcement::class, 'announcement_id');
    }
}
