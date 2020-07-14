@extends('layouts.app')

@section('title', 'Instituciones')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Institución
        </h1>
        <a href="{{ route('estudiantes.show', $student->id) }}" class="btn btn-sm btn-primary pull-right">Volver</a>
    </div>

    <div class="row">

        <div class="col-lg-12">
              <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editar Institución</h6>
                </div>
                <div class="card-body">
                    @include('admin.partials.errors')
                    <form action="{{ route('instituciones.update', ['estudiante' => $student->id, 'institution' => $institution->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="nombre" class="col-form-label col-sm-2">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" id="nombre" autofocus value="{{ $institution->nombre }}" placeholder="Nombres y Apellidos">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Editar Institución</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection