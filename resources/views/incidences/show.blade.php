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

                <h4 class="text-center mt-3">Comentarios:</h4>

                <div class="card-body">
                    @auth
                    @if (count($incidence->comments) > 0)
                    <ul class="list-group">
                        @forelse ($incidence->comments as $comment)
                        <li class="list-group-item">
                            <div>
                                <strong>Comentario:</strong> {{ $comment->text }}
                            </div>
                            <div>
                                <strong>Tiempo Usado:</strong> {{ $comment->time_used }}
                            </div>
                            <div>
                                <strong>Por:</strong> {{ $comment->user?->name }}
                            </div>
                            @if (auth()->user()->id === $comment->user_id)
                            <div>
                                <a href="{{ route('comments.edit', ['comment' => $comment]) }}" class="btn btn-primary btn-sm">Editar</a>
                                @if (Auth::user()->id === $incidence->owner->id)
                                <form action="{{ route('comments.destroy', ['comment' => $comment]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este comentario?')">Eliminar</button>
                                </form>
                                @endif
                            </div>
                            @endif
                        </li>
                        @empty
                        <li class="list-group-item">No hay comentarios todavía.</li>
                        @endforelse
                    </ul>
                    @else
                    <p>No hay comentarios todavía.</p>
                    @endif
                    @endauth
                </div>

                @auth
                @if ($incidence->department?->id == auth()->user()->department_id)
                <div class="card-footer">
                    <a href="{{ route('comments.create', ['incidence_id' => $incidence->id]) }}" class="btn btn-primary">Añadir Comentario</a>
                </div>
                @endif
                @endauth

                @guest
                <div class="card-footer text-center">
                    <p>Debes estar registrado para ver los comentarios.</p>
                </div>
                @endguest

                <div class="card-footer text-center">
                    <a href="{{ route('incidences.index') }}" class="btn btn-primary">Volver a la lista de incidencias</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
