<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Video;
use Illuminate\Http\Request;

class CommentsController extends Controller
{


    public function show(){
        $video = $this->getRandomVideo();


        return view('comment', compact('video'));
    }



    public function getRandomVideo()
    {
        //Get all comment allowed videos
        $video = Video::where('user_id', '!=' , auth()->id())->get();
        //Pickup a random one
        return $video->random();
    }


    public function store(Video $video)
    {

        Comments::create([
            'comment_text' => request('commentText'),
            'vedio_id' => $video->id,
            'user_id' => auth()->id()
        ]);

        return back();

    }
}
