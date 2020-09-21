<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Storage;

class PostController extends Controller
{
    public function dashboard() {
        return view('blog', ['posts' => Post::active(), 'owner_page' => false]);
    }

    public function index() {
        return view('blog', ['posts' => \Auth::user()->posts()->get(), 'owner_page' => true]);
    }

    public function show($post) {
        $post = Post::findOrFail($post);
        if ($post->active || ($post->user_id == \Auth::id())) {
            return view('posts.show', ['post' => $post]);
        }

        return redirect('404');
    }

    public function create() {
        return view('posts.form', ['post' => null]);
    }

    public function store(CreatePostRequest $request) {
        $post = new Post();
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->text = $request->get('text');
        $post->active = 1;
        $post->user_id = \Auth::id();
        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    public function edit($post) {
        $post = Post::findOrFail($post);

        if ($post->user_id == \Auth::id()) {
            return view('posts.form', ['post' => $post]);
        }

        return redirect('404');
    }

    public function update(Post $post, UpdatePostRequest $request) {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();

            $path = 'images/'.$fileName;

            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            Storage::disk('public')->put($path, \File::get($image), 'public');
        } else {
            $path = $post->image ?? null;
        }

        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->text = $request->get('text');
        $post->image = $path;
        $post->active = 1;
        $post->user_id = \Auth::id();
        $post->save();

        return back();
    }

    public function destroy($post) {
        $post = Post::findOrFail($post);

        try {
            if ($post->user_id == \Auth::id()) {
                if ($post->image) {
                    Storage::disk('public')->delete($post->image);
                }
                $post->delete();
            }
        } catch (\Exception $e) {
            return redirect('404');
        }

        return redirect()->route('dashboard');
    }
}
