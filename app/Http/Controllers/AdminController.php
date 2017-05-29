<?php

namespace App\Http\Controllers;

use App\Video;
use App\User;
use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos=Video::all();
        return view('admin.videos',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getVideos()
    {
     $videos=   Video::all();
     return view('admin.videos' , compact('videos'));
    }



    public function showVideo($id)
    {
        $video=Video::find($id);
        return view('admin.video' , compact('video'));
    }


    public function showUsers()
    {
        $users=User::all();
        return view('admin.users' , compact('users'));
    }

    public function showAdvanced()
    {

        return view('admin.advanced' );
    }

    public function showUserVideos($id)
    {
        $videos=Video::where('user_id','=', $id);
        return view('admin.videos',compact('videos') );
    }
    public function generateCorpus()
    {
        $temp="";
        $videos= Video::all();
        $contents = "";


        foreach ($videos as $video)
        {

            $comments=$video->comments()->where('video_id','=',$video->id)->get();

            foreach ($comments as $comment)
            {


                $temp .="\n*". $comment->comment_text;

                //dd($temp);
            }
            $contents ="Vidéo ".($video->pseudo_code)." --->  ".$temp;

            Storage::append('file.txt', $contents);
            $temp="";
            $contents="";

        }

        return back();
    }
}
