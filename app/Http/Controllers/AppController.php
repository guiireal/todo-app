<?php

namespace App\Http\Controllers;

class AppController extends Controller
{
    public function __invoke()
    {
        return inertia('App');
    }
}
