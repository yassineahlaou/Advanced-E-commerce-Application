<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BlogPost;
use App\Models\PostComment;


class CommentReply extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function blogpost(){
        return $this->belongsTo(BlogPost::class, 'post_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function comment(){
        return $this->belongsTo(PostComment::class, 'comment_id', 'id');
    }

}
