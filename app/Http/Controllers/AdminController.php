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
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function showVideoComments($id)
    {
        $video=Video::find($id);
        $comments= $video->comments()->get();
        return view('admin.comments' , compact('comments'));
    }

    public function showUsers()
    {
        $users=User::all();
        return view('admin.users' , compact('users'));
    }

    public function showAdvanced()
    {
        Storage::delete('corpus.txt');
        return view('admin.advanced' );
    }

    public function showUserVideos(Request $request)
    {
        $user = User::find($request->get('user_id'));

        //dd($request->get('user_id'));
        $videos=$user->videos()->get();//Video::where('user_id','=',$request->get('user_id'));

        return view('admin.videos',compact('videos') );
    }


    public function showUserComments(Request $request)
    {
        $user = User::find($request->get('user_id'));

        //dd($request->get('user_id'));
        $comments=$user->comments()->get();

        return view('admin.comments',compact('comments') );
    }

    public function generateCorpus()
    {
        Storage::put('corpus.txt', "");

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
            $contents ="**********************\nVidéo pseudo_code  :".($video->pseudo_code)."//////////\nVidéo Commentaires   ".$temp;

            Storage::append('corpus.txt', $contents);
            $temp="";
            $contents="";

        }
        $storedFile = Storage::get('corpus.txt');


        return view('admin.Corpus',compact('storedFile'));
    }

    public function downloadCorpus()
    {
        $path = storage_path('app/corpus.txt');

        return response()->download($path);
    }
}
