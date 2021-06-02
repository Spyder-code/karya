<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'author',
        'content',
        'title',
        'type',
        'post_excerpt',
        'schedule',
        'status',
        'point'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function postStatus()
    {
        return $this->belongsTo(PostStatus::class,'status');
    }

    public function typePost()
    {
        return $this->belongsTo(PostType::class,'type');
    }
}
