@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Categorias</h1>

    <ul class="list-group">
        @foreach ($categories as $category)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('categories.show', $category) }}" class="text-primary">{{ $category->name }}</a>
                    <span class="text-muted">Creado el: {{ $category->created_at }}</span>
                    <div class="btn-group">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-secondary">Editar</a>

                        <!-- Utiliza un formulario para eliminar el departamento -->
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
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
        <a class="btn btn-primary" href="{{ route('categories.create') }}" role="button">Crear Categoria</a>
    </div>
</div>
@endsection
