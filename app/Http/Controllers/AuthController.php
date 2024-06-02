<?php

namespace App\Http\Controllers;

use Inertia\Response;

class AuthController extends Controller
{
    public function index(): Response
    {
        return inertia('Login');
    }
}
