@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Categorías</h1>

    @foreach ($categoriesWithIncidences as $categoryWithIncidences)
        <div class="mb-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Últimas 5 Incidencias</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div>
                                <a href="{{ route('categories.show', $categoryWithIncidences['category']) }}" class="text-primary">{{ $categoryWithIncidences['category']->name }}</a>
                                @auth
                                <div class="btn-group" style="display: inline;">
                                    <a href="{{ route('categories.edit', $categoryWithIncidences['category']) }}" class="btn btn-secondary" style="display: inline;">Editar</a>
                                    <form action="{{ route('categories.destroy', $categoryWithIncidences['category']) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </td>
                        <td>
                            @include('incidence-info', ['incidences' => $categoryWithIncidences['incidences']->take(5)])
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach

    @auth
    <div class="text-center mt-4">
        <a class="btn btn-primary" href="{{ route('categories.create') }}" role="button">Crear Categoría</a>
    </div>
    @endauth
</div>
@endsection
