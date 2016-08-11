<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Illuminate\Support\Facades\Auth;


/**
 * Class ArticlesController
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller
{

    /**
     * Attach the middleware in Articles Controller
     * except the index.
     *
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Shows all articles
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::latest()->published()->get();

        return view('articles.index', compact('articles'));
    }


    /**
     * Shows selected article
     *
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $id
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Creates a new article
     *
     * @param Tag $tag_list
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Tag $tag_list)
    {

        return view ('articles.create', compact('tag_list'));
    }

    /**
     * Store the created article
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);

        flash()->success('Your article has been created!');
        return redirect('articles');
    }


    /**
     * Edits existing article.
     *
     * @param Article $article
     * @param Tag $tag_list
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $id
     */
    public function edit(Article $article, Tag $tag_list)
    {
        return view('articles.edit', compact('article', 'tag_list'));
    }

    /**
     * Updates the edited article.
     *
     * @param Article $article
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @internal param $id
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        flash()->success('Your article has been updated!');
        return redirect('articles');
    }

    /**
     * Synchronises the tags.
     *
     * @param Article $article
     * @param array $tags
     * @return array
     * @internal param ArticleRequest $request
     */
    private function syncTags(Article $article, array $tags)
    {
        return $article->tags()->sync($tags);

    }

    /**
     * Creates an article.
     *
     * @param ArticleRequest $request
     * @return mixed
     */
    private function createArticle(ArticleRequest $request)
    {
        $article =  Auth::user()->articles()->create($request->all());
        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }
}
