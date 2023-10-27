@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Comentario</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $comment->id }}</li>
        <li class="list-group-item"><strong>Texto:</strong> {{ $comment->text }}</li>
        <li class="list-group-item"><strong>Tiempo Usado:</strong> {{ $comment->time_used }}</li>
        <li class="list-group-item"><strong>Incidente:</strong> {{ $comment->incidence->title }}</li>
        <li class="list-group-item"><strong>Usuario:</strong> {{ $comment->user->name }}</li>
    </ul>

    <a href="{{ route('comments.index') }}" class="btn btn-primary mt-3">Volver a la Lista de Comentarios</a>
</div>
@endsection
