@extends('layouts.admin')

@section('name') Категории @stop

@section('content')

<a class="btn btn-sm btn-default" href="javascript: history.back();">Назад</a>
<a href="/admin/categories/add" class="btn btn-sm btn-primary">Добавить</a>

@include('errors.messages')

@if(count($categories))
    {{-- */ $num = '1'; /* --}}
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="30"><div align="center">#</div></th>
                <th>Название</th>
                <th width="100"><div align="center">Действия</div></th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td align="center" valign="middle">{{ $num }}</td>
                <td>{{{ $category->name }}}</td>
                <td align="center" valign="middle">
                    <a href="/admin/categories/edit/{{ $category->id }}">редакт.</a>
                    &nbsp;
                    <a href="/admin/categories/del/{{ $category->id }}" onclick="return confirm('Удалить?')">удал.</a>
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
