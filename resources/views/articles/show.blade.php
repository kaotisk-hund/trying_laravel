@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>

    @unless(Auth::guest())
        <h4><a href="{{ url('/articles/'.$article->id.'/edit') }}">Edit</a></h4>
    @endunless

    <div class="body">{{ $article->body }}</div>

@stop