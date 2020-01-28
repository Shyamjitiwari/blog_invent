@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Edit Category Page</h1>

        <form action="/categories/{{$content->id}}/update" method="POST">
        @csrf
        @method('PUT')
        <label for="">Category Name</label>
        <input type="text" class="form-control" name='name' value="{{$content->name}}" placeholder="Category name"> <br>
        <label for="">category Description</label>
        <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$content->description}}</textarea><br><br>
        <input type="submit" class="btn  btn-outline-primary"value='Edit Category'>
        </form>
    </div>
</div>

@endsection