@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Incidencias</div>

                <div class="card-body">
                    <ul class="list-group">
                        @forelse ($incidences as $incidence)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ route('incidences.show', $incidence) }}">{{ $incidence->title }}</a>
                                <span class="badge badge-primary badge-pill">
                                    (Categoría: {{ $incidence->category->name }}, Departamento: {{ $incidence->department->name }})
                                </span>
                                <div>
                                    <a href="{{ route('incidences.edit', $incidence) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('incidences.destroy', $incidence) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta incidencia?')">Eliminar</button>
                                    </form>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">No hay incidencias registradas.</li>
                        @endforelse
                    </ul>

                    <a href="{{ route('incidences.create') }}" class="btn btn-primary mt-3">Crear Nueva Incidencia</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
