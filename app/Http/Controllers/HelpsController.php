<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpsController extends Controller
{
    public function show()
    {
        return view('help');
    }

}
