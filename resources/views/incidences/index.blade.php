@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Lista de Incidencias</div>

                <div class="card-body">
                    @if (count($incidences) > 0)
                        <table class="table table-bordered table-primary text-white">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Categoría</th>
                                    <th>Departamento</th>
                                    <th>Dueño</th>
                                    <th>Creado</th>
                                    <th>Actualizado</th>
                                    @auth
                                    <th>Acciones</th>
                                    @endauth
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incidences as $incidence)
                                <tr>
                                    <td><a href="{{ route('incidences.show', $incidence) }}">{{ $incidence->title }}</a></td>
                                    <td>{{ $incidence->category?->name }}</td>
                                    <td>{{ $incidence->department->name }}</td>
                                    <td>{{ $incidence->owner->name }}</td>
                                    <td>{{ $incidence->created_at }}</td>
                                    <td>{{ $incidence->updated_at }}</td>
                                    @auth
                                    <td>
                                        @if (auth()->user()->id === $incidence->owner->id)
                                        <div class="btn-group" style="display: inline;">
                                            <a href="{{ route('incidences.edit', $incidence) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('incidences.destroy', $incidence) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta incidencia?')">Eliminar</button>
                                            </form>
                                        </div>
                                        @endif
                                    </td>
                                    @endauth
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No hay incidencias registradas.</p>
                    @endif

                    @auth
                    <div>
                        <a href="{{ route('incidences.create') }}" class="btn btn-primary mt-3">Crear Nueva Incidencia</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
