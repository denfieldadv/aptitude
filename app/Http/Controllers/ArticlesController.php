<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\CommentRequest;

class ArticlesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();

        return view('articles.home', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $request->commit();

        return redirect(route('home'))->with('success', 'Your article has been posted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->where('published', 1)->firstOrFail();

        return view('articles.show', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function comment(CommentRequest $request, $slug)
    {
        $article = Article::where('slug', $slug)->where('published', 1)->firstOrFail();

        $request->commit($article->id);

        return back()->with('success', 'Your comment has been posted successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        // Update article

        return redirect(route('home'))->with('success', 'Your article has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $article->delete();

        return redirect(route('home'))->with('success', 'Your article has been deleted successfully.');
    }
}
