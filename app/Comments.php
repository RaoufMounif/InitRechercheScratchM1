<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $fillable = [
        'comment_text', 'video_id' , 'user_id'
    ];


    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function videos()
    {
        return $this->belongsTo(Video::class);
    }
}
