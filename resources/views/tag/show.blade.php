@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
    <h1>Tag Display</h1><br>
    <table class="table table-striped table-borderless">
    <tr><th>Tage name</th></tr>
    <tr>
    <td>{{$tag->name}}</td>
    
    </tr>
    </table>
    </div>
</div>
@endsection
    