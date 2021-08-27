@extends('layout.layout')

@section('title', $title)

@section('content')

<a href="/" class="btn btn-primary col-1 ml-5 mt-5">Voltar</a>
<section class="card ml-5 mt-3 mr-5 p-3">
    <div class="mb-3">
        <label for="fileJson" class="form-label">Selecione o arquivo</label>
        <input class="form-control" name="arquivo" type="file" accept="application/json" id="fileJson">
    </div>
    <button type="submit" id="submitFile" class="btn btn-primary">Enviar</button>
</section>
@endsection