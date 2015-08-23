@extends('layouts.main')

@section('content')

<div class="content_title">{{ $category->name }}</div>

@if(count($articles))
    @foreach($articles as $article)
        <div class="article">
            <div class="article_name">{{ $article->name }}</div>
            <div class="article_date">{{ $article->created_at }}</div>
            <div class="article_text">{!! $article->text !!}</div>
            <div class="article_link"><a href="/article/{!! $article->id !!}">Подробнее</a></div>
            <div class="clear"></div>
        </div>

    @endforeach
@endif

<?= $articles->render() ?>

@stop
