<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tagName = $request->tag_name ? $request->tag_name : '';
        $blogTitle = $request->blog_title ? $request->blog_title : '';
        $tags = Tags::where('name','like','%'.$tagName.'%')
        ->whereHas('blogs', function(Builder $query)use($blogTitle){
            $query->where('title','like','%'.$blogTitle.'%');
        })->paginate(3);
    
        return view('tag.index')->withTags($tags)->withTagName($tagName)->withBlogTitle($blogTitle);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tag = new Tags;
        $tag->name = $request->name;
        $tag->save();

        return redirect('tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show(Tags $tag)
    {
        //
        return view('tag.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit(Tags $tag)
    {
        //
        return view('tag.edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tags $tag)
    {
        //
        $tag->name = $request->name;
        $tag->save();

        return redirect('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tags $tag)
    {
        //
        $tag->delete();
        return redirect('tags');
    }
}
