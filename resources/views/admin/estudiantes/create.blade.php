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
              <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nuevo Estudiante</h6>
                </div>
                <div class="card-body">
                    @include('admin.partials.errors')
                    <form action="{{ route('estudiantes.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre" class="col-form-label col-sm-2">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" id="nombre" autofocus value="{{ old('nombre') }}" placeholder="Nombres y Apellidos">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="codigo" class="col-form-label col-sm-2">Codigo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="codigo" id="codigo" value="{{ old('codigo') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="proyecto" class="col-form-label col-sm-2">Título de Proyecto</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="proyecto" id="proyecto" value="{{ old('proyecto') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">Nuevo Estudiante</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection