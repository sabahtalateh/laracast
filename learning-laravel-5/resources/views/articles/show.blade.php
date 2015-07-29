@extends('app')

@section('content')
    <h1>{{ $article->title }}</h1>
    <hr/>
    <article>{{ $article->body }}</article>

    @unless($article->tags->isEmpty())

        <h5>Tags:</h5>
        <ul>
            @foreach($article->tags as $tag)
                <li>
                    <a href="#">{{ $tag->name }}</a>
                </li>
            @endforeach
        </ul>

    @endunless
@stop