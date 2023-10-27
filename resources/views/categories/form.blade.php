@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($category))
        <h1>Editar Categoría</h1>
        <form class="mt-2" name="edit_category" action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
    @else
        <h1>Crear Categoría</h1>
        <form class="mt-2" name ="create_category" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($category) ? $category->name : '' }}" required/>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Guardar Cambios' : 'Crear' }}</button>
    </form>
</div>
@endsection
