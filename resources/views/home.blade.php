@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="jumbotron"><a href="/categories"><button class="btn btn-primay btn-lg btn-block">Index Page</button></a></div>
                    You are logged in!

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
