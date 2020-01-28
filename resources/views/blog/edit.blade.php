@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center display-5"> Edit BLog Page</h1>

        <form action="{{route('blogs.update', $blog)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Blog Title</label>
        <input type="text" class="form-control" name='name' value="{{$blog->title}}"> <br>
        <label for="">Blog Category</label>
        <select class="form-control" name="c_name" id="">
        @foreach ($categories as $category)
        <option 
        @if($category->id == $blog->category_id)
        selected
        @endif
         value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select><br>
        <label for="">Select Tags</label>
        <select class="form-control" multiple name="tag_id[]" id="">
        @foreach($tags as $tag)
        <option 
        @foreach($blog->tags as $blog_tag)
        @if($tag->id == $blog_tag->id)
        selected
        @endif
        @endforeach
        value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
        </select>
        <br><br>
        <label for="">category Description</label>
        <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$blog->description}}</textarea><br><br>
        <input type="submit" class="btn  btn-outline-primary"value='Edit Blog'>
        </form>
    </div>
</div>

@endsection