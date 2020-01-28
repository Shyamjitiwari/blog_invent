@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
    <h1 class="text-center">All Blogs</h1><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="title" class="sr-only">Title</label>
                    <input type="text" name="title" class="form-control" name="title" placeholder="Title..." value="{{$title}}">
                </div>
                <div class="form-group mb-2">
                    <label for="category" class="sr-only">Category</label>
                    <input type="text" name="category" class="form-control" name="category" placeholder="Category..." value="{{$category}}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
    <a href="/blogs/create"><button class="btn btn-primary btn-lg btn-block">Add Blog</button></a>
    <br><br>
    <table class="table table-striped">
    <tr><th>Blog No.</th><th>Blog Title</th><th>Category</th><th>Action</th></tr>
    @foreach ($blogs as $index => $blog)
    <tr>
    <td>{{$index + $blogs->firstItem()}}</td>
    <td>{{ $blog->title }}</td>
    <td>{{$blog->category->name}}</td>
    <td><a href="{{route('blogs.show', $blog)}}"><button class="btn btn-outline-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
    <a href="{{route('blogs.edit', $blog)}}"><button class="btn btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
    <form action="{{route('blogs.destroy', $blog)}}" method='post'>
    @csrf 
    @method('delete')
    <button type='submit' class="btn btn-outline-danger "><i class="fa fa-trash" aria-hidden="true"></i></button>
    
    </form></td>
    
    </tr>
    @endforeach
    </table>
    {{$blogs->appends($_GET)->links()}}
    </div>
</div>
    
@endsection