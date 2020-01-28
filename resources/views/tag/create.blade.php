@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
    <h1 class="text-center">Tag Blog</h1><br>
    <div class="form-group">
    <form action="{{route('tags.store')}}" method="POST">
        @csrf()
        <label for="">Tag Name</label>
        <input type="text" class="form-control" name='name' value="" placeholder="Tag"> <br>
        
        <input type="submit" class="btn  btn-outline-primary"value='Create tag'>
        </form>
    </div>
    
    </div>
        
    </div>
@endsection