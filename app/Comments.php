<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $fillable = [
        'comment_text', 'vedio_id' , 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function vedio()
    {
        return $this->belongsTo(Video::class);
    }
}
