<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //no usages
    protected $fillable=[
        'title',
        'description',
        'user_id',

    ];

    public function user(){
        return $this->belongsTo(related:User::class);
    }

    public function postBy(){
        return $this->belongsTo(related:User::class,foreignkey:'user_id');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
