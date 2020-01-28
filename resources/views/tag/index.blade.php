@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
    <h1 class="text-center">All Tags</h1><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="title" class="sr-only">Name</label>
                    <input type="text" name="tag_name" class="form-control" placeholder="Tag..." value="{{$tagName}}">
                </div>
                <div class="form-group mb-2">
                    <label for="category" class="sr-only">Blog</label>
                    <input type="text" name="blog_title" class="form-control"  placeholder="Blog..." value="{{$blogTitle}}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
    <a href="{{route('tags.create')}}"><button class="btn btn-primary btn-lg btn-block">Add Tag</button></a>
    <br><br>
    <table class="table table-striped">
    <tr><th>Tag No.</th><th>Tag Name</th><th>Blogs Name</th><th>Action</th></tr>
    @foreach ($tags as $index=>$tag)
    <tr>
    <td>{{$index + $tags->firstItem()}}</td>
    <td>{{ $tag->name }}</td>
    <td>
    @foreach($tag->blogs as $blog)
    <span class="badge badge-dark">{{$blog->title}}</span>
    @endforeach
    </td>
    <td><a href="{{route('tags.show', $tag)}}"><button class="btn btn-outline-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
    <a href="{{route('tags.edit', $tag)}}"><button class="btn btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
    <form action="{{route('tags.destroy', $tag)}}" method='post'>
    @csrf 
    @method('delete')
    <button type='submit' class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
    
    </form></td>
    
    </tr>
    @endforeach
    </table>
    {{$tags->appends($_GET)->links()}}
    </div>
</div>
    
@endsection