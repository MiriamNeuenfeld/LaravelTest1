<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index() {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }

    public function create() {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store() {
        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1; // auth()->id()
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));
    }

    public function edit(Article $article) {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article) {
        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    public function destroy() {
    }

    protected function validateArticle() {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
