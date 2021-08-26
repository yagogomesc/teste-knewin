@extends('layout.layout')

@section('title', $title)

@section('content')

<a href="/" class="btn btn-primary col-1 ml-5 mt-5">Voltar</a>
<div class="card ml-5 mt-3 mr-5 p-3">
    <form method="GET" action="/notices" enctype="multipart/form-data">
        
        <div class="mb-3">
            <label for="formJson" class="form-label">Default file input example</label>
            <input class="form-control" name="arquivo" type="file" accept="application/json" id="formJson">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection