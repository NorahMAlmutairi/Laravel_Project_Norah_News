<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'thumbnail',
        'category_id',
        'content',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query)
    {

        if (request('search')) {

            $query->where('title', 'like', '%' . request('search') . '%')->orWhere('content', 'like', '%' . request('search') . '%');
        }
    }
}
