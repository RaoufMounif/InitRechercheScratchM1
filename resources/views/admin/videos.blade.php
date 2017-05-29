@extends('layouts.admin')

@section('content')
    <div style="background-color: #3c3c3c">
        @foreach($videos as $video)
            <div class="card ">

                <div class="card-header ">
                    Vidéo ID : {{$video->id}}
                </div>
                <div class="card-block  ">
                    <h4 class="card-title">Pseudo Code: &numsp;{{$video->pseudo_code}}</h4>
                    <pre class="card-text ">{{$video->xml}}</pre>
                    <a href="/test_admin/video/{{$video->id}}/comments" class="btn btn-primary">Voir Commentaires</a>
                    <a href="/test_admin/video/{{$video->id}}/delete" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
            <br>
        @endforeach


    </div>
    <script>
        document.getElementById('nav_tab_videos').className="nav-link active";
    </script>

@endsection
