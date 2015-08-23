@extends('layouts.admin')

@section('name') Добавление статьи @stop

@section('content')

    <a href="javascript: history.back();" class="btn btn-sm btn-default">Назад</a>

    @include('errors.formErrors')

    {!! Form::open(['action' => 'ArticleController@postAdd', 'method' => 'POST', 'role' => 'form']) !!}

    @include('articles.form')

    {!! Form::close() !!}

@stop