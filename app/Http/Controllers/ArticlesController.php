<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Articles;
use Request;


class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Articles::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view ('articles.create');
    }

    public function store()
    {

        $input = Request::all();
        Articles::create($input);

        return redirect('articles');
    }
}
