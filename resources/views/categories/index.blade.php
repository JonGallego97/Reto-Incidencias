@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Categorias</h1>

    <ul class="list-group">
        @foreach ($categoriesWithIncidences as $categoryWithIncidences)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('categories.show', $categoryWithIncidences['category']) }}" class="text-primary">{{ $categoryWithIncidences['category']->name }}</a>
                    <span class="text-muted">Creado el: {{ $categoryWithIncidences['category']->created_at }}</span>
                    @auth
                    <div class="btn-group">
                        <a href="{{ route('categories.edit', $categoryWithIncidences['category']) }}" class="btn btn-secondary">Editar</a>

                        <form action="{{ route('categories.destroy', $categoryWithIncidences['category']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </div>
                    @endauth
                </div>
            </li>

            <!-- Aquí se muestran las últimas 5 incidencias de la categoría en una tabla -->
            <p>Últimas 5 incidencias:</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Fecha de Creación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoryWithIncidences['incidences']->take(5) as $incidence)
                        <tr>
                            <td><a href="{{ route('incidences.show', $incidence) }}">{{ $incidence->title }}</a></td>
                            <td>{{ $incidence->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </li>
        @endforeach
    </ul>

    @auth
    <div class="text-center mt-4">
        <a class="btn btn-primary" href="{{ route('categories.create') }}" role="button">Crear Categoria</a>
    </div>
    @endauth
</div>
@endsection
