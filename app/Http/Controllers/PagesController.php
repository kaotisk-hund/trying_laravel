<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function about()
    {
        $name ='marios';
        return view('pages.about')->with('name', $name);
    }
}
