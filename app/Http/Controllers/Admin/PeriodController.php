<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Period;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::orderBy('id', 'DESC')->paginate(5);
        return view('admin.periodos.index', compact('periods'));
    }

    public function create()
    {
        return view('admin.periodos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',        
        ]);

        Period::create([
            'name' => $request->nombre,
            'state' => 'activo',
        ]);

        return redirect()->route('periodos.index')->with('message', 'Período Académico creado exitosamente!');
    }

    public function edit($id)
    {
        $period = Period::findOrFail($id);
        return view('admin.periodos.edit', compact('period'));
    }

    public function update(Request $request, $id)
    {

        $period = Period::findOrFail($id);

        $request->validate([
            'nombre' => 'required',        
        ]);

        $period->update([
            'name' => $request->nombre,
        ]);

        return redirect()->route('periodos.index')->with('message', 'Período Académico actualizado exitosamente!');
    }

    public function destroy($id)
    {
        $period = Period::findOrFail($id);
        $period->delete();

        return redirect()->route('periodos.index')->with('message', 'Período Académico eliminado exitosamente!');
    }
}
