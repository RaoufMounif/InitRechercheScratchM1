@extends('layouts.admin')

@section('content')
    <div class="card  ">

        <div class="card-header card-primary" style="font-size: 20px;">
            <strong>Corpus d'apprentissage</strong>
        </div>
        <div class="card-block  ">

            <pre  style="font-size: 15px;"><strong>{{$storedFile}}</strong></pre>

        </div>
    </div>
    <hr>
    <div>
        <button class="btn btn-success btn-block" onclick="download()">

            Télécharger

        </button>
        <script>
            function download() {
                window.location.pathname = '/test_admin/download';
            }
        </script>
    </div>
@endsection