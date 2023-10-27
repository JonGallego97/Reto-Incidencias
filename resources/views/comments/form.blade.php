@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($comment))
        <h1>Editar Comentario</h1>
        <form class="mt-2" name="edit_comment" action="{{ route('comments.update', $comment) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
    @else
        <h1>Crear Comentario</h1>
        <form class="mt-2" name="create_comment" action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="form-group mb-3">
            <label for="text" class="form-label">Texto</label>
            <input type="text" class="form-control" id="text" name="text" value="{{ isset($comment) ? $comment->text : '' }}" required/>
        </div>
        <div class="form-group mb-3">
            <label for="time_used" class="form-label">Tiempo Usado</label>
            <input type="text" class="form-control" id="time_used" name="time_used" value="{{ isset($comment) ? $comment->time_used : '' }}" required/>
        </div>

        <input type="hidden" name="incidence_id" value="{{ $comment->incidence_id ?? $incidence->id ?? '' }}">

        <button type="submit" class="btn btn-primary">{{ isset($comment) ? 'Guardar Cambios' : 'Crear' }}</button>
    </form>
</div>
@endsection
