@extends('layouts.admin')

@section('name') Добавление категории @stop

@section('content')

    <a href="javascript: history.back();" class="btn btn-sm btn-default">Назад</a>

    @include('errors.formErrors')

    {!! Form::open(['action' => 'CategoryController@postAdd', 'method' => 'POST', 'role' => 'form']) !!}

    @include('categories.form')

    {!! Form::close() !!}

@stop