@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $incidence->title }}</div>

                <div class="card-body">
                    <p><strong>Descripción:</strong> {{ $incidence->text }}</p>
                    <p><strong>Minutos estimados:</strong> {{ $incidence->estimated_minutes }}</p>
                    <p><strong>Categoría:</strong> {{ $incidence->category->name }}</p>
                    <p><strong>Departamento:</strong> {{ $incidence->department->name }}</p>
                    <p><strong>Creado por:</strong> {{ $incidence->owner->name }}</p>

                    <h4>Comentarios:</h4>
                    <ul>
                        @forelse ($incidence->comments as $comment)
                            <li>{{ $comment->text }} (Por {{ $comment->user->name }})</li>
                        @empty
                            <li>No hay comentarios todavía.</li>
                        @endforelse
                    </ul>

                    <a href="{{ route('incidences.index') }}" class="btn btn-primary">Volver a la lista de incidencias</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
