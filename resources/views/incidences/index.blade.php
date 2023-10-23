@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Incidencias</div>

                <div class="card-body">
                    <ul>
                        @forelse ($incidences as $incidence)
                            <li>
                                <a href="{{ route('incidences.show', $incidence) }}">{{ $incidence->title }}</a>
                                (Categoría: {{ $incidence->category->name }}, Departamento: {{ $incidence->department->name }})
                            </li>
                        @empty
                            <li>No hay incidencias registradas.</li>
                        @endforelse
                    </ul>

                    <a href="{{ route('incidences.create') }}" class="btn btn-primary">Crear Nueva Incidencia</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
