@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($department))
        <h1>Editar Departamento</h1>
        <form class="mt-2" name="edit_department" action="{{ route('departments.update', $department) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
    @else
        <h1>Crear Departamento</h1>
        <form class="mt-2" name="create_department" action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($department) ? $department->name : '' }}" required/>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($department) ? 'Guardar Cambios' : 'Crear' }}</button>
    </form>
</div>
@endsection
