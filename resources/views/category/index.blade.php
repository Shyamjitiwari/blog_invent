@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
    <h1 class="text-center">All cateogries</h1><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="title" class="sr-only">Name</label>
                    <input type="text" name="category_name" class="form-control" placeholder="Category..." value="{{$categoryName}}">
                </div>
                <div class="form-group mb-2">
                    <label for="category" class="sr-only">Blog</label>
                    <input type="text" name="blog_title" class="form-control"  placeholder="Category..." value="{{$blogTitle}}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
    <a href="/categories/create"><button class="btn btn-primary btn-lg btn-block">Add Category</button></a>
    <br><br>
    <table class="table table-striped">
    <tr><th>Category No.</th><th>Category Name</th><th>Total Blogs</th><th>Blogs</th><th>Action</th></tr>
    @foreach ($categories as $index => $category)
    <tr>
    <td>
    {{$index + $categories->firstItem()}}
    </td>
    <td>{{ $category->name }}</td>
    <td>
    {{$category->blogs->count()}}
    </td>
    <td>
    @foreach($category->blogs as $blog)
    <span class="badge badge-dark">{{$blog->title}}</span><br>
    @endforeach
    </td>
    <td><a href="/categories/{{$category->id}}/show"><button class="btn btn-outline-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
    <a href="/categories/{{$category->id}}/edit"><button class="btn btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
    <form action='/categories/{{$category->id}}/destroy' method='post'>
    @csrf 
    @method('delete')
    <button type='submit' class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
    
    </form></td>
    
    </tr>
    @endforeach
    </table>
    <span>{{$categories->appends($_GET)->links()}}</span>
    
    </div>
</div>
    
@endsection