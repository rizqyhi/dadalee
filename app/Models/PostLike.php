<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PostLike extends Pivot
{
    public $incrementing = true;
    protected $fillable = ['user_id', 'post_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
