@extends('layouts.app') <!-- Asegúrate de que la ruta de tu archivo de diseño sea correcta -->

@section('content')
<div class="container">
    <h1>Detalles del Comentario</h1>

    <ul>
        <li><strong>ID:</strong> {{ $comment->id }}</li>
        <li><strong>Texto:</strong> {{ $comment->text }}</li>
        <li><strong>Tiempo Usado:</strong> {{ $comment->time_used }}</li>
        <li><strong>Incidente:</strong> {{ $comment->incidence->name }}</li>
        <li><strong>Usuario:</strong> {{ $comment->user->name }}</li>
    </ul>

    <a href="{{ route('comments.index') }}" class="btn btn-primary">Volver a la Lista de Comentarios</a>
</div>
@endsection
