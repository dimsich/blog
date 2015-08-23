@extends('layouts.admin')

@section('name') Редактирование статьи @stop

@section('content')

    <a href="javascript: history.back();" class="btn btn-sm btn-default">Назад</a>

    @include('errors.formErrors')

    {!! Form::model($article, ['action' => ['ArticleController@postEdit', $article->id], 'method' => 'POST', 'role' => 'form']) !!}

    @include('articles.form')

    {!! Form::close() !!}

@stop