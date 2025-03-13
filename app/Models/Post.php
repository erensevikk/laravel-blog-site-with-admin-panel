<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Enums\PostStatus;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable=['title','description','image','name','user_id','status','usertype'];

    protected $casts = [
        'status' => PostStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
