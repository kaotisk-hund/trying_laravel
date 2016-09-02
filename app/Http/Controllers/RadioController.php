<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RadioController extends Controller
{
    public function index()
    {
        return view('radio.index');
    }
}
