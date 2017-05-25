<?php

use App\User;
use App\Video;

use Illuminate\Support\Facades\DB;
echo "je t'aime";
if (!empty($_POST['data'])) {
    $data = $_POST['data'];

    $user = DB::table('users')->first();
    var_dump($user);
}

?>