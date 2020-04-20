<?php

namespace App\Http\Controllers\Admin;

use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index()
    {
        return view('home');
    }
}
