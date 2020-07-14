@extends('layouts.app')

@section('title', 'Períodos')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Períodos Académicos
        </h1>
        <a href="{{ route('periodos.create') }}" class="btn btn-sm btn-success pull-right">Nuevo Período Académico</a>
    </div>

    <div class="row">

        <div class="col-lg-12">
              <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Períodos Académicos</h6>
                </div>
                <div class="card-body">
                    @include('admin.partials.message')
                    @if (count($periods))
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Nombre</td>
                                    <td colspan="3">Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periods as $period)
                                <tr>
                                    <td>{{ $period->id }}</td>
                                    <td>{{ $period->name }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary" onclick="event.preventDefault(); document.getElementById('form-periodo-{{ $period->id }}').submit()">Seleccionar Período</button>
                                        <form action="{{ route('setPeriodo') }}" method="POST" class="my-3" style="display:none;" id="form-periodo-{{ $period->id }}">
                                            @csrf
                                            <input type="text" name="periodo_id" value="{{ $period->id }}" style="display:none;">
                                        </form>
                                    </td>
                                    <td><a href="{{ route('periodos.edit', $period->id) }}" class="btn btn-sm btn-primary">Editar</a></td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="event.preventDefault(); if (confirm('Estas seguro de eliminar este Período Académico?')) { document.getElementById('form-delete-{{ $period->id }}').submit() }">Eliminar</button>
                                        <form action="{{ route('periodos.destroy', $period->id) }}" method="POST" id="form-delete-{{ $period->id }}" style="display:none">
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
                    <div class="alert alert-info">No hay Períodos para mostrar, agrega uno primero!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection