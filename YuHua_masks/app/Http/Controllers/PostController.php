<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(Request $request)
    {
        echo $request-> Input("name");
    }
}