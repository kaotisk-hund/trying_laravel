@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>

    @unless(Auth::guest())
        <h4><a class="btn btn-primary" href="{{ url('/articles/'.$article->id.'/edit') }}">Edit</a></h4>
    @endunless
    <div class="tags">{{ $article->tag }}</div>
    <div class="body">{{ $article->body }}</div>

    @unless($article->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach( $article->tags as $tag )
                {{ $tag->name }}
            @endforeach
        </ul>
    @endunless
@stop