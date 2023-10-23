@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Categoria</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nombre de la Categoria: {{ $category->name }}</h5>
            <p class="card-text">Creado el: {{ $category->created_at }}</p>
        </div>
    </div>

    <a class="btn btn-primary mt-3" href="{{ route('categories.index') }}">Volver a la lista de categorias</a>
</div>
@endsection
