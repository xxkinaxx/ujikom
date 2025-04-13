<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'image',
        'price',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
