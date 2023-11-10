@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Departamento</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nombre del Departamento: {{ $department->name }}</h5>
            <p class="card-text">Creado el: {{ $department->created_at }}</p>

            <h5>Usuarios en este Departamento:</h5>
            @if ($department->users->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha de Creación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($department->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay usuarios en este departamento.</p>
            @endif
        </div>
    </div>

    <a class="btn btn-primary mt-3" href="{{ route('departments.index') }}">Volver a la lista de departamentos</a>
</div>
@endsection
