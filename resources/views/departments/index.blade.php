@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Departamentos</h1>

    @foreach ($departmentsWithIncidences as $departmentWithIncidences)
        <div class="mb-4">
            <table class="table table-bordered table-primary">
                <thead>
                    <tr>
                        <th>Departamento</th>
                        <th>Últimas 5 Incidencias</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div>
                                <a href="{{ route('departments.show', $departmentWithIncidences['department']) }}" class="text-primary">{{ $departmentWithIncidences['department']->name }}</a>
                                @auth
                                <div class="btn-" style="display: inline;">
                                    <a href="{{ route('departments.edit', $departmentWithIncidences['department']) }}" class="btn btn-secondary" style="display: inline;">Editar</a>

                                    <form action="{{ route('departments.destroy', $departmentWithIncidences['department']) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este departamento?')">Eliminar</button>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </td>
                        <td>
                            @include('incidence-info', ['incidences' => $departmentWithIncidences['incidences']])
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @auth
    <div class="text-center mt-4">
        <a class="btn btn-primary" href="{{ route('departments.create') }}" role="button">Crear Departamento</a>
    </div>
    @endauth
</div>
@endsection
