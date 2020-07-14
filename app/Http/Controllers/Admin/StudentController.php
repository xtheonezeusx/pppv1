<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::orderBy('id', 'DESC')->paginate(5);
        return view('admin.estudiantes.index', compact('students'));
    }

    public function create()
    {
        return view('admin.estudiantes.create');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:students',
            'proyecto' => 'required',
        ]);

        Student::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'proyecto' => $request->proyecto,
            'period_id' => $request->session()->get('periodo_id'),
        ]);

        return redirect()->route('estudiantes.index')->with('message', 'Estudiante creado exitosamente');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.estudiantes.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.estudiantes.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:students,codigo,' . $student->id,
            'proyecto' => 'required',
        ]);

        $student->update([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'proyecto' => $request->proyecto,
        ]);

        return redirect()->route('estudiantes.index')->with('message', 'Estudiante actualizado exitosamente');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('estudiantes.index')->with('message', 'Estudiante eliminado exitosamente');
    }
}
