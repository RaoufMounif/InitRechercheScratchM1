<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //

    protected $fillable = [
        'xml', 'pseudo_code' , 'user_id'
    ];


    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function addComment($comment_text)
    {
        $this->comments()->create(compact('comment_text'));
    }



}
