@extends('layout.layout')

@section('title', $title)

@section('content')

<form method="POST" action="/notices">
    @csrf
    <button type="submit" class="btn btn-primary col-2 ml-5 mt-5">Cadastrar noticia</button>
</form>

    <div class="card m-5 p-3">
    @if(isset($notices) && count($notices) > 0)
    <div class="list-group">
        @foreach ($notices as $item)
            <a href="{{route('notices.show', $item->id)}}" class="list-group-item list-group-item-action">
                {{$item->titulo}}
            </a>
        @endforeach
    </div>
    @else
        <h3 class="p-4">Ainda não possuimos nenhuma noticia cadastrada.</h3>
    @endif
</div>

@endsection