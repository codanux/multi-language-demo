<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use App\Models\Post\PostCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PostCategory $category
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = (new PostCategory())->newQuery()->locale()->paginate();

        return view('admin.post.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        session()->now('_old_input', $request->all());
        return view('admin.post.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);

        $category = PostCategory::create([
            'name' => $request->get('name'),
            'locale' => $request->get('locale'),
            'translation_of' => $request->get('translation_of'),
        ]);

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategory $category)
    {
        $request->validate([
            'name' => ['required']
        ]);

        $category->update([
            'name' => $request->get('name'),
        ]);

        return redirect()->routeLocale('admin.category.edit', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $category)
    {
        //
    }
}
