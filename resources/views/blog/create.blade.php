@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
    <h1 class="text-center">Create Blog</h1><br>
    <div class="form-group">
    <form action="{{route('blogs.store')}}" method="POST">
        @csrf()
        <label for="">Blog Title</label>
        <input type="text" class="form-control" name='title' value="" placeholder="Blog"> <br>
        <label for="">Select Blog Category</label>
        <select class="form-control" name="c_name" id="">
        <option>--Select category--</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
        <br><br>
        <label for="">Select Tags</label>
        <select class="form-control" multiple name="tag_id[]" id="">
        <option value="">--select tags--</option>
        @foreach($tags as $tag)
        <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
        </select><br><br>
        <label for="">Blog Description</label>
        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea><br><br>
        <input type="submit" class="btn  btn-outline-primary"value='Post Blog'>
        </form>
    </div>
    
    </div>
        
    </div>
@endsection