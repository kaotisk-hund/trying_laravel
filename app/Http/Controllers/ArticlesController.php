<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Articles;
use Request;


/**
 * Class ArticlesController
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller
{
    /**
     * Shows all articles
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Articles::latest()->published()->get();
        return view('articles.index', compact('articles'));
    }


    /**
     * Shows selected article
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $article = Articles::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Creates a new article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view ('articles.create');
    }

    /**
     * Store the created article
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        Articles::create(Request::all());
        return redirect('articles');
    }
}
