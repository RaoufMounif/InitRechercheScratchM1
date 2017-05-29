<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">

    <a class="navbar-brand" href="#">
    <img src="/img/play.PNG" width="30" height="30" class="d-inline-block align-top" alt="">
        Cpanel</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a id="nav_tab_videos"class="nav-link " href="/test_admin/">Vidéos </a>
            </li>
            <li class="nav-item">
                <a id="nav_tab_users" class="nav-link" href="/test_admin/users">Utilisateurs</a>
            </li>

            <li class="nav-item">
                <a id="nav_tab_advanced" class="nav-link " href="/test_admin/advanced">Filtres Avancés </a>
            </li>
        </ul>
    </div>
</nav>  <br>
<div class="container">
@yield('content')
</div>
</body>
</html>