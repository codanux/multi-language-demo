<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use App\Models\Post\PostCategory;
use App\Models\Tag\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PostCategory $category
     * @return Response
     */
    public function index()
    {
        $categories = (new PostCategory())->newQuery()->with('translations')->locale()->paginate();

        return view('admin.post.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $tags = Tag::locale()->pluck('name', 'id');

        session()->now('_old_input', $request->all());

        return view('admin.post.category.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'locale' => [
                'required',
                Rule::unique('post_categories')
                    ->where('locale', $request->get('locale'))
                    ->where('translation_of', $request->get('translation_of'))
            ],
            'translation_of' => ['nullable']
        ]);

        $category = PostCategory::create($data);

        $category->tags()->sync($request->get('tags', []));

        return redirect()->routeLocale('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param PostCategory $category
     * @return void
     */
    public function show(PostCategory $category)
    {
        $posts = $category->posts()->newQuery()->with('translations')->latest()->limit(5)->paginate();

        return view('admin.post.category.show', compact('category', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PostCategory $category
     * @return Response
     */
    public function edit(PostCategory $category)
    {
        $data = $category->toArray();
        $data['tags'] = $category->tags->pluck('id')->toArray();
        session()->now('_old_input', $data);

        $tags = Tag::locale()->pluck('name', 'id');

        return view('admin.post.category.edit', compact('category', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param PostCategory $category
     * @return Response
     */
    public function update(Request $request, PostCategory $category)
    {
        $data = $request->validate([
            'name' => ['required'],
            'locale' => [
                'required',
                Rule::unique('post_categories')
                    ->where('locale', $request->get('locale'))
                    ->where('translation_of', $category->translation_of)
                    ->ignore($category)
            ],
        ]);

        $category->update($data);

        $category->tags()->sync($request->get('tags', []));

        return redirect()->routeLocale('admin.category.edit', $category, $category->locale);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PostCategory $category
     * @return Response
     */
    public function destroy(PostCategory $category)
    {
        //
    }
}
