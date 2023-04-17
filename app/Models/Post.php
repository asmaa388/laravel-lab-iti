<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    //no usages
    protected $fillable=[
        'title',
        'description',
        'user_id',
        'slug',

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
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
