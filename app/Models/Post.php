<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'parent_id', 'content'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class);
    }

    public function replies()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'post_likes')
            ->withTimestamps()
            ->using(PostLike::class);
    }
}
