<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index()
    {
        return view('api-docs');
    }
}

