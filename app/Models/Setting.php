<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'link_registration',
        'link_guide',
        'link_upload_post',
        'link_poster',
        'link_announcement',
        'event_id',
    ];

    public function event()
    {
        return $this->BelongsTo(Event::class, 'event_id');
    }
}
