<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['name', 'slug'];

    public function posts()
    {
        return $this->hasMany(Post::class);
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
