@extends('layouts.admin')

@section('content')
    <div style="background-color: #3c3c3c">
        @foreach($comments as $comment)
            <div class="card ">

                <div class="card-header ">
                    Vidéo ID : {{$comment->id}}
                </div>
                <div class="card-block  ">

                    <pre class="card-text ">{{$comment->comment_text}}</pre>
                    <a href="/test_admin/comment/{{$comment->id}}/delete" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
            <br>
        @endforeach


    </div>


@endsection
