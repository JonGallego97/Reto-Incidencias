@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Departamento</h1>
    <form class="mt-2" name="create_platform" action="{{route('departments.update',$department)}}"
method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}" required/>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
