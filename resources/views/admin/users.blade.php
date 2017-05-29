@extends('layouts.admin')

@section('content')
    <div style="background-color: #3c3c3c">
        @foreach($users as $user)
            <div class="card ">

                <div class="card-header ">
                    User ID : {{$user->id}}
                </div>
                <div class="card-block  ">
                    <h4 class="card-title">User Name: &numsp;{{$user->name}}</h4>
                    <pre class="card-text ">{{$user->email}}</pre>
                    <a href="#" class="btn btn-primary">Voir Commentaires</a>
                </div>
            </div>
            <br>
        @endforeach

    <script>
        document.getElementById('nav_tab_users').className="nav-link active";
    </script>
    </div>

@endsection
