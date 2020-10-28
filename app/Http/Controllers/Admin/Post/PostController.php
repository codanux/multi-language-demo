<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use App\Models\Post\PostCategory;
use App\Models\Tag\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     * @return Response
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

        $data['user_id'] = auth()->id();

        $post = $category->posts()->create($data);

        $post->tags()->sync($request->get('tags', []));

        return redirect()->routeLocale('admin.post.index', $category, $category->locale);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(PostCategory $category, Post $post)
    {
        return view('admin.post.show', compact('category', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param PostCategory $category
     * @param Post $post
     * @return Response
     */
    public function edit(Request $request, PostCategory $category, Post $post)
    {
        $data = $post->toArray();
        $data['tags'] = $post->tags->pluck('id')->toArray();
        session()->now('_old_input', $data);

        $tags = Tag::locale()->pluck('name', 'id');

        return view('admin.post.edit', compact('post', 'category', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     */
    public function update(Request $request, PostCategory $category, Post $post)
    {
        $data = $request->validate([
            'name' => ['required'],
            'body' => ['required'],
            'locale' => [
                Rule::unique('posts')
                    ->where('locale', $request->get('locale'))
                    ->where('translation_of', $request->get('translation_of'))
            ],
        ]);

        $post->update($data);

        $post->tags()->sync($request->get('tags', []));

        return redirect()->routeLocale('admin.post.index', $category, $category->locale);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
