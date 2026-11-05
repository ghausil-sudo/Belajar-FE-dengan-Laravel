<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', [
            'students' => $students,
            'student' => null,
            'modalOpen' => false,
        ]);
    }

    public function create()
    {
        return view('students.index', [
            'students' => Student::all(),
            'student' => null,
            'modalOpen' => true,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|unique:students|max:30',
            'name' => 'required|string|max:255',
            'class_name' => 'required|string|max:255',
            'gender' => 'required|string|max:20',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('students.index', [
            'students' => Student::all(),
            'student' => $student,
            'modalOpen' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validatedData = $request->validate([
            'nis' => 'required|unique:students,nis,' . $student->id . '|max:30',
            'name' => 'required|string|max:255',
            'class_name' => 'required|string|max:255',
            'gender' => 'required|string|max:20',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
