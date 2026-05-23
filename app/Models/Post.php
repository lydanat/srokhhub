<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'category_id',
        'title_en',
        'title_km',
        'content_en',
        'content_km',
        'main_image',
        'status',
        'source',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->HasMany(PostImage::class);
    }

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) { 
            if (empty($model->id)) {
                $model->id = Str::uuid()->toString();
            }
        });
    }
}
