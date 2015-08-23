@extends('layouts.admin')

@section('name') Редактирование категории @stop

@section('content')

    <a href="javascript: history.back();" class="btn btn-sm btn-default">Назад</a>

    @include('errors.formErrors')

    {!! Form::model($category, ['action' => ['CategoryController@postEdit', $category->id], 'method' => 'POST', 'role' => 'form']) !!}

    @include('categories.form')

    {!! Form::close() !!}

@stop