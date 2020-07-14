<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adviser;
use App\Student;

class AdviserController extends Controller
{

    public function create($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.asesores.create', compact('student'));
    }

    public function store(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $request->validate([
            'nombre' => 'required',
        ]);

        Adviser::create([
            'nombre' => $request->nombre,
            'student_id' => $student->id,
        ]);

        return redirect()->route('estudiantes.show', $student->id)->with('message', 'Asesor agregado correctamente!');
    }

    public function edit($estudiante, $asesor)
    {
        $student = Student::findOrFail($estudiante);
        $adviser = Adviser::findOrFail($asesor);
        return view('admin.asesores.edit', compact('student', 'adviser'));
    }

    public function update(Request $request, $estudiante, $asesor)
    {
        $student = Student::findOrFail($estudiante);
        $adviser = Adviser::findOrFail($asesor);

        $request->validate([
            'nombre' => 'required',
        ]);

        $adviser->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('estudiantes.show', $student->id)->with('message', 'Asesor actualizado correctamente!');
    }

    public function destroy($estudiante, $asesor)
    {
        $student = Student::findOrFail($estudiante);
        $adviser = Adviser::findOrFail($asesor);
        $adviser->delete();

        return redirect()->route('estudiantes.show', $student->id)->with('message', 'Asesor eliminado correctamente!');
    }
}
