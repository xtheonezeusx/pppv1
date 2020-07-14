@extends('layouts.app')

@section('title', 'Estudiantes')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Estudiantes
        </h1>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-sm btn-primary pull-right">Volver</a>
    </div>

    <div class="row">

        <div class="col-lg-12">
            @include('admin.partials.message')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mostrar Estudiante</h6>
                </div>
                <div class="card-body">
                        <div class="form-group row">
                            <label for="nombre" class="col-form-label col-sm-2">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" id="nombre" autofocus value="{{ $student->nombre }}" placeholder="Nombres y Apellidos" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="codigo" class="col-form-label col-sm-2">Codigo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="codigo" id="codigo" value="{{ $student->codigo }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="proyecto" class="col-form-label col-sm-2">Título de Proyecto</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="proyecto" id="proyecto" value="{{ $student->proyecto }}" readonly>
                            </div>
                        </div>

                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Asesor
                        @if ($student->adviser == NULL)
                        <a href="{{ route('asesores.create', $student->id) }}" class="btn btn-sm btn-success float-right">Añadir Asesor</a>
                        @endif
                    </h6>
                </div>
                <div class="card-body">
                    @if ($student->adviser != NULL)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Asesor</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $student->adviser->nombre }}</td>
                                    <td><a href="{{ route('asesores.edit', ['estudiante' => $student->id, 'asesor' => $student->adviser->id]) }}" class="btn btn-sm btn-primary">Editar</a></td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="event.preventDefault(); if (confirm('Estas seguro de eliminar este Asesor?')) { document.getElementById('form-delete-{{ $student->adviser->id }}').submit() }">Eliminar</button>
                                        <form action="{{ route('asesores.destroy', ['estudiante' => $student->id, 'asesor' => $student->adviser->id]) }}" method="POST" id="form-delete-{{ $student->adviser->id }}" style="display:none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-info">Agrega el Asesor del Estudiante</div>
                    @endif
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Institución
                        @if ($student->institution == NULL)
                        <a href="{{ route('instituciones.create', $student->id) }}" class="btn btn-sm btn-success float-right">Añadir Institución</a>
                        @endif
                    </h6>
                </div>
                <div class="card-body">
                    @if ($student->institution != NULL)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Asesor</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $student->institution->nombre }}</td>
                                    <td><a href="{{ route('instituciones.edit', ['estudiante' => $student->id, 'institution' => $student->institution->id]) }}" class="btn btn-sm btn-primary">Editar</a></td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="event.preventDefault(); if (confirm('Estas seguro de eliminar este Institución?')) { document.getElementById('form-delete-{{ $student->institution->id }}').submit() }">Eliminar</button>
                                        <form action="{{ route('instituciones.destroy', ['estudiante' => $student->id, 'institution' => $student->institution->id]) }}" method="POST" id="form-delete-{{ $student->institution->id }}" style="display:none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-info">Agrega la Institución donde el Estudiante esta realizando PPP</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection