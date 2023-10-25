@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Comentarios</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Texto</th>
                <th>Tiempo Usado</th>
                <th>Incidente</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->text }}</td>
                    <td>{{ $comment->time_used }}</td>
                    <td>{{ $comment->incidence->name }}</td>
                    <td>{{ $comment->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
