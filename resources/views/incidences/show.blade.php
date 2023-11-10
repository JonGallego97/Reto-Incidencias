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
                    <p><strong>Categoría:</strong> {{ $incidence->category?->name }}</p>
                    <p><strong>Departamento:</strong> {{ $incidence->department?->name }}</p>
                    <p><strong>Creado por:</strong> {{ $incidence->owner?->name }}</p>
                </div>

                @include('comment-template', ['incidence' => $incidence])

            </div>
        </div>
    </div>
</div>
@endsection
