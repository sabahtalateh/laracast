<?php

namespace App\Http\Controllers;

use App\Article;

use App\Tag;
use Carbon\Carbon;

use App\Http\Requests\ArticleRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Illuminate\Support\Facades\Redirect;

/**
 * Class ArticlesController
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller
{
    /**
     *
     */
    function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * @param Article $article
     * @return \Illuminate\View\View
     * @internal param $id
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    /**
     * @param ArticleRequest $request
     * @return Redirect
     */
    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);

        flash()->overlay('Your article has been created', 'Good Job');

        return redirect('articles');
    }

    /**
     * @param Article $article
     * @return \Illuminate\View\View
     * @internal param $id
     */
    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * @param Article $article
     * @param ArticleRequest $request
     * @return Redirect
     * @internal param $id
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));
//        $article->tags()->detach(Tag::lists('id')->toArray());
//        $article->tags()->attach($request->input('tag_list'));
//        $article->tags()->sync($request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * @param Article $article
     * @param $tags
     */
    private function syncTags(Article $article, $tags)
    {
        $article->tags()->sync($tags);
    }

    /**
     * @param ArticleRequest $request
     */
    public function createArticle(ArticleRequest $request)
    {
        $article = \Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));
    }

    public function r()
    {
        return 1;
    }
}
