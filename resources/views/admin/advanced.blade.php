@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col " >

            <legand><strong>Get Vidéos pour l'utilisateur ID</strong></legand><hr>
            <form method="POST" action="/test_admin/videos/user_id" >
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">User ID</label>
                    <div class="col-sm-10">
                        <input  name="user_id" class="form-control" id="user_id" placeholder="Insérer User ID ">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Get Vidéos</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col">
            <legand><strong>Générer le corpus </strong></legand><hr>
            <button type="submit" class="btn btn-success"><a class="btn-link" href="/test_admin/corpus">Générer</a></button>
        </div>
        <div class="w-100"></div>
        <div class="col">
            <legand><strong>Title 1 </strong></legand><hr>
            <form>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Run</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col">
            <legand><strong>Title 1 </strong></legand><hr>
            <form>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Run</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('nav_tab_advanced').className="nav-link active";
    </script>
@endsection
