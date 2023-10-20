@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Departamento</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nombre del Departamento: {{ $department->name }}</h5>
            <p class="card-text">Creado el: {{ $department->created_at }}</p>
        </div>
    </div>

    <a class="btn btn-primary mt-3" href="{{ route('departments.index') }}">Volver a la lista de departamentos</a>
</div>
@endsection
