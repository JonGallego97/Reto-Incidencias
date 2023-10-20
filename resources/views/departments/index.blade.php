@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Departamentos</h1>

    <ul class="list-group">
        @foreach ($departments as $department)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('departments.show', $department) }}" class="text-primary">{{ $department->name }}</a>
                    <span class="text-muted">Escrito el: {{ $department->created_at }}</span>
                    <div class="btn-group">
                        <a href="{{ route('departments.edit', $department) }}" class="btn btn-secondary">Editar</a>

                        <!-- Utiliza un formulario para eliminar el departamento -->
                        <form action="{{ route('departments.destroy', $department) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este departamento?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="text-center mt-4">
        <a class="btn btn-primary" href="{{ route('departments.create') }}" role="button">Crear Departamento</a>
    </div>
</div>
@endsection
