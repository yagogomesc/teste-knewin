@extends('layout.layout')

@section('title', $title)

@section('content')

<a href="{{route('index')}}" class="btn btn-primary col-2 ml-5 mt-5">Voltar</a>
<div class="card m-5 p-3">
    <div class="notice-header">
        <h1 class="display-4 fw-bold">{{$notice->titulo}}</h1>
        <h1 class="display-5">{{isset($notice->subtitulo) ? $notice->subtitulo : ''}}</h1>
    </div>
    <hr/>
    <h5 class="pl-4">Fonte: <a href="{{$notice->url}}" class="text-reset">{{$notice->fonte}}</a></h5>
    <h5 class="pl-4">Publicado em: {{$notice->data_publicacao->format('d-m-Y H:i:s')}}</h5>
    <p class="lead text-start notice-content">{!!nl2br($notice->conteudo)!!}</p>
</div>
@endsection