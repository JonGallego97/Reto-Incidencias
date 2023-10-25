@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($incidence))
        <h1>Editar Incidencia</h1>
        <form class="mt-2" name="edit_incidence" action="{{ route('incidences.update', $incidence) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
    @else
        <h1>Crear Incidencia</h1>
        <form class="mt-2" name="create_incidence" action="{{ route('incidences.store') }}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="form-group mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ isset($incidence) ? $incidence->title : '' }}" required/>
        </div>
        <div class="form-group mb-3">
            <label for="text" class="form-label">Texto</label>
            <input type="text" class="form-control" id="text" name="text" value="{{ isset($incidence) ? $incidence->text : '' }}" required/>
        </div>
        <div class="form-group mb-3">
            <label for="estimated_minutes" class="form-label">Minutos Estimados</label>
            <input type="text" class="form-control" id="estimated_minutes" name="estimated_minutes" value="{{ isset($incidence) ? $incidence->estimated_minutes : '' }}" required/>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($incidence) ? 'Guardar Cambios' : 'Crear' }}</button>
    </form>
</div>
@endsection
