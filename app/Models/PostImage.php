<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PostImage extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'post_id',
        'image_url'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
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
