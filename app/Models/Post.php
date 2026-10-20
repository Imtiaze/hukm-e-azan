<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'slug', 'featured_image', 'excerpt', 'body', 'is_published', 'published_at'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title) . '-' . Str::random(5);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}