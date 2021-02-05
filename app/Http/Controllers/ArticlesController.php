<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index() {
        // Renders a list of a resource.
        return view('articles.index', ['articles' => Article::latest()->get()]);
    }

    public function show($id) {
        // Show a single resource.

        return view('articles.show', ['article' => Article::find($id)]);
    }

    public function create() {
        // Shows a view to create a resource.

        return view('articles.create');
    }

    public function store(Article $article) {
        // Persists the new resource.

        request()->validate([
           'title' => 'required',
           'excerpt' => 'required',
           'body' => 'required'
        ]);

        $article->save();

        return redirect('/articles');
    }

    public function edit(Article $article) {
        // Shows a view to edit an existing resource.

        return view('articles.edit', compact('article'));
    }

    public function update(Article $article) {
        // Persists the edited resource.

        return redirect('/articles');
    }

    public function destroy() {
        // Deletes the resource.
    }
}
