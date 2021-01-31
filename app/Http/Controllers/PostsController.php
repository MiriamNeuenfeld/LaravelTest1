<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($post) {
        $posts = [
            'my-first-post' => 'First Post',
            'my-second-post' => 'Second Post'
        ];

        if (! array_key_exists($post, $posts)) {
            abort(404, "Sorry, page not found.");
        }

        return view('post', [
            'post' => $posts[$post]
        ]);
    }
}
