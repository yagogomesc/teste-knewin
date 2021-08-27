@extends('layout.layout')

@section('title', $title)

@section('content')

<form method="POST" action="/notices">
    @csrf
    <a href="{{route('notices.create')}}" class="btn btn-primary col-2 ml-5 mt-5">Cadastrar noticia</a>
</form>

<section id="notices-list" class="card m-5 p-3 ">
    <div class="list-group">
    </div>
</section>

@endsection