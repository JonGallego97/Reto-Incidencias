@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Departamentos</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Departamento</th>
                <th>Últimas 5 Incidencias</th>
                @auth
                <th>Acciones</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($departmentsWithIncidences as $departmentWithIncidences)
            <tr>
                <td><a href="{{ route('departments.show', $departmentWithIncidences['department']) }}" class="text-primary">{{ $departmentWithIncidences['department']->name }}</a></td>
                <td>
                    <ul>
                        @foreach ($departmentWithIncidences['incidences'] as $incidence)
                        <li><a href="{{ route('incidences.show', $incidence) }}">{{ $incidence->title }}</a></li>
                        @endforeach
                    </ul>
                </td>
                @auth
                <td>
                    <div class="btn-group">
                        <a href="{{ route('departments.edit', $departmentWithIncidences['department']) }}" class="btn btn-secondary">Editar</a>

                        <form action="{{ route('departments.destroy', $departmentWithIncidences['department']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este departamento?')">Eliminar</button>
                        </form>
                    </div>
                </td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>

    @auth
    <div class="text-center mt-4">
        <a class="btn btn-primary" href="{{ route('departments.create') }}" role="button">Crear Departamento</a>
    </div>
    @endauth
</div>
@endsection
