<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $blogTitle = $request->blog_title ? $request->blog_title : '';
        $categoryName = $request->category_name  ? $request->category_name : '';
        $categories = Category::where('name', 'like', '%'.$categoryName.'%')
        ->orWhereHas('blogs', function(Builder $query)use($blogTitle){
            $query->where('title', 'like', '%'.$blogTitle.'%');
        })-> paginate(3);  //static method to fetch all the data
        return view('category.index')->withCategories($categories)->withCategoryName($categoryName)->withBlogTitle($blogTitle); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();

        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //return view('category/show');
        //return $id;
        $category = Category::find($id);
        return view('category.show')->withCategory($category);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $content = Category::find($id);
        return view('category.edit')->withContent($content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id); 
        $category->name=$request->name;
        $category->description=$request->description;
    
        $category->save();

        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $content = Category::find($id);

        $content->delete();
        return redirect('categories');
        
    }
}
