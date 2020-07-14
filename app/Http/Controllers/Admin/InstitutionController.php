<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Institution;

class InstitutionController extends Controller
{
    public function create($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.instituciones.create', compact('student'));
    }

    public function store(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $request->validate([
            'nombre' => 'required',
        ]);

        Institution::create([
            'nombre' => $request->nombre,
            'student_id' => $student->id,
        ]);

        return redirect()->route('estudiantes.show', $student->id)->with('message', 'Institución agregada correctamente!');
    }

    public function edit($estudiante, $institution)
    {
        $student = Student::findOrFail($estudiante);
        $institution = Institution::findOrFail($institution);
        return view('admin.instituciones.edit', compact('student', 'institution'));
    }

    public function update(Request $request, $estudiante, $institution)
    {
        $student = Student::findOrFail($estudiante);
        $institution = Institution::findOrFail($institution);

        $request->validate([
            'nombre' => 'required',
        ]);

        $institution->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('estudiantes.show', $student->id)->with('message', 'Institución actualizada correctamente!');
    }

    public function destroy($estudiante, $institution)
    {
        $student = Student::findOrFail($estudiante);
        $institution = Institution::findOrFail($institution);
        $institution->delete();

        return redirect()->route('estudiantes.show', $student->id)->with('message', 'Institución eliminada correctamente!');
    }
}
