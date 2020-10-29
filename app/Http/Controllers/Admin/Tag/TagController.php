<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = (new Tag())->newQuery()->with('translations')->locale()->paginate();

        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        session()->now('_old_input', $request->all());
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'locale' => [
                'required',
                Rule::unique('tags')
                    ->where('locale', $request->get('locale'))
                    ->where('translation_of', $request->get('translation_of'))
            ],
            'translation_of' => ['nullable']
        ]);

        $tag = Tag::create($data);

        return redirect()->routeLocale('admin.tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @return Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return Response
     */
    public function edit(Tag $tag)
    {
        session()->now('_old_input', $tag->toArray());

        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tag $tag
     * @return Response
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => ['required'],
            'locale' => [
                'required',
                Rule::unique('tags')
                    ->where('locale', $request->get('locale'))
                    ->where('translation_of', $request->get('translation_of'))
                    ->ignore($tag)
            ],
        ]);

        $tag->update($data);

        return redirect()->routeLocale('admin.tag.edit', $tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return Response
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->routeLocale('admin.tag.index');
    }
}
