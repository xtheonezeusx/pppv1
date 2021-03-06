@extends('layouts.app')

@section('title', 'Estudiantes')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Estudiantes
        </h1>
        <a href="{{ route('estudiantes.create') }}" class="btn btn-sm btn-success pull-right">Nuevo Estudiante</a>
    </div>

    <div class="row">

        <div class="col-lg-12">
              <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Estudiantes</h6>
                </div>
                <div class="card-body">
                    @include('admin.partials.message')
                    @if (count($students))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Nombre</td>
                                    <td colspan="3">Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td><a href="{{ route('estudiantes.show', $student->id) }}">{{ $student->nombre }}</a></td>
                                    <td><a href="{{ route('estudiantes.edit', $student->id) }}" class="btn btn-sm btn-primary">Editar</a></td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="event.preventDefault(); if (confirm('Estas seguro de eliminar este Estudiante?')) { document.getElementById('form-delete-{{ $student->id }}').submit() }">Eliminar</button>
                                        <form action="{{ route('estudiantes.destroy', $student->id) }}" method="POST" id="form-delete-{{ $student->id }}" style="display:none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-info">No hay Estudiantes para mostrar!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection