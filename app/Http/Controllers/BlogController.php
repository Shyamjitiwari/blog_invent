<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = ($request->title) ? $request->title : '';
        $category = ($request->category) ? $request->category : '';
        
        $blogs = Blog::where('title', 'like', '%'.$title.'%')
        ->whereHas('category', function (Builder $query) use($category) {
            $query->where('name', 'like', '%'.$category.'%');
        })
        ->paginate(5);

        return view('blog.index')->withBlogs($blogs)->withTitle($title)->withCategory($category);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = Tags::all();
        $categories = Category::all();
        return view('blog/create')->withCategories($categories)->withTags($tags);
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
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category_id = $request->c_name;
        $blog->save();

        $blog->tags()->sync($request->tag_id);

        return redirect('blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        
        return view('blog.show')->withBlog($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        $tags = Tags::all();
        $categories = Category::all();
        return view('blog.edit')->withBlog($blog)->withCategories($categories)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response     
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $blog->title = $request->name;
        $blog->description = $request->description;
        $blog->category_id =  $request->c_name;
        $blog->save();

        $blog->tags()->sync($request->tag_id);

        return redirect('blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
        $blog->delete();
        return redirect('blogs');
    }
}
