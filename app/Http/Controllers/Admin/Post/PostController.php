<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use App\Models\Post\PostCategory;
use App\Models\Tag\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostCategory $category)
    {
        $posts = $category->posts()->with('translations')->locale()->latest()->paginate();

        return view('admin.post.index', compact('category', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(PostCategory $category, Request $request)
    {
        $tags = Tag::locale()->pluck('name', 'id');

        session()->now('_old_input', $request->all());

        return view('admin.post.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param PostCategory $category
     * @return void
     */
    public function store(Request $request, PostCategory $category)
    {
        $data = $request->validate([
            'name' => ['required'],
            'body' => ['required'],
            'locale' => [
                Rule::unique('posts')
                    ->where('locale', $request->get('locale'))
                    ->where('translation_of', $request->get('translation_of'))
            ],
            'translation_of' => ['nullable']
        ]);

        $post = $category->posts()->create($data);

        $post->tags()->sync($request->get('tags', []));

        return redirect()->routeLocale('admin.post.index', $category, $category->locale);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $category, Post $post)
    {
        return view('admin.post.show', compact('category', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Post\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
