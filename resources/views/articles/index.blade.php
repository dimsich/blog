@extends('layouts.admin')

@section('name') Статьи @stop

@section('content')

<a class="btn btn-sm btn-default" href="javascript: history.back();">Назад</a>
<a href="/admin/articles/add" class="btn btn-sm btn-primary">Добавить</a>

@include('errors.messages')

@if(count($articles))
    {{-- */ $num = '1'; /* --}}
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="30"><div align="center">#</div></th>
                <th>Название</th>
                <th width="250">Категория</th>
                <th width="100"><div align="center">Действия</div></th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td align="center" valign="middle">{{ $num }}</td>
                <td>{{{ $article->name }}}</td>
                <td align="center">{{{ $article->category->name }}}</td>
                <td align="center" valign="middle">
                    <a href="/admin/articles/edit/{{ $article->id }}">редакт.</a>
                    &nbsp;
                    <a href="/admin/articles/del/{{ $article->id }}" onclick="return confirm('Удалить?')">удал.</a>
                </td>
            </tr>
        {{-- */ $num++ /* --}}
        @endforeach
        </tbody>
    </table>
@else
<p>Нет добавленных элементов</p>
@endif

@stop
