@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="jumbotron">
    <h1>Category</h1><br>
    <div class="form-group">
    <form action="/categories/store" method="POST">
        @csrf()
        <label for="">Category Name</label>
        <input type="text" class="form-control" name='name' value="" placeholder="Category name"> <br>
        <label for="">category Description</label>
        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea><br><br>
        <input type="submit" class="btn  btn-outline-primary"value='Add Category'>
        </form>
    </div>
    
    </div>
        
    </div>
    @endsection