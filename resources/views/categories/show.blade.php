@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Nombre de la Categoría: {{ $category->name }}</h5>
            <p class="card-text">Creado el: {{ $category->created_at }}</p>
        </div>
    </div>

    <div class="mt-4">
        <h3>Número de Incidencias en esta Categoría: {{ $category->incidences->count() }}</h3>

        <h4>Lista de Incidencias en esta Categoría:</h4>
        @if ($category->incidences->isNotEmpty())
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->incidences as $incidence)
                            <tr>
                                <td>{{ $incidence->title }}</td>
                                <td>
                                    <a href="{{ route('incidences.show', ['incidence' => $incidence]) }}" class="btn btn-primary btn-sm">Detalles</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No hay incidencias en esta categoría.</p>
        @endif
    </div>

    <a class="btn btn-primary mt-3" href="{{ route('categories.index') }}">Volver a la lista de categorías</a>
</div>
@endsection
