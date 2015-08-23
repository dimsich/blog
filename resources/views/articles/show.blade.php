@extends('layouts.main')

@section('content')

<div class="content_title">{{ $article->name }}</div>

<br>
{!! $article->text !!}

@stop
