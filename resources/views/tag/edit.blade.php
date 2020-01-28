@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Edit Tag Page</h1>

        <form action="{{route('tags.update', $tag)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Tag Name</label>
        <input type="text" class="form-control" name='name' value="{{$tag->name}}"> <br>
        <input type="submit" class="btn  btn-outline-primary"value='Edit Blog'>
        </form>
    </div>
</div>

@endsection