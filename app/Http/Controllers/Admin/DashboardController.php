<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Adviser;
use App\Period;
use App\Institution;

class DashboardController extends Controller
{
    public function index()
    {   
        $students = Student::all();
        $advisers = Adviser::all();
        $periods = Period::all();
        $institutions = Institution::all();
        return view('admin.dashboard', compact('students', 'advisers', 'periods', 'institutions'));
    }
}
