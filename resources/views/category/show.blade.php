@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
    <h3 class="text-center">
        View Category
    </h3>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3>{{$category->name}}</h3>
                    <hr>
                    <p class="text-justify">
                        {{$category->description}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            All Blogs ({{$category->blogs->count()}})
            @foreach($category->blogs as $blog)
                <div class="card p-0 m-0 mb-1">
                    <div class="card-body p-0 m-0">
                        <a href="{{route('blogs.show', $blog)}}">{{$blog->title}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</div>
@endsection
    