<?php

namespace App\Models;

use App\Classes\CommentsStatus;
use App\Classes\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'user_id',
        'cart_id',
        'content',
        'score'
    ];
    protected $casts = [
        'status' => CommentsStatus::class
    ];

    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function food()
    {
        return $this->belongsTo(Food::class);
    }

    protected function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
