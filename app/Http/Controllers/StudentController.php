<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'studentNumber' => 'required|string|max:20|unique:students',
            'lname'           => 'required|string|max:150',
            'fname'           => 'required|string|max:150',
            'mi'              => 'nullable|string|max:2',
            'email'           => 'nullable|email|max:150|unique:students',
            'contactNumber'   => 'nullable|string|max:20',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')
                         ->with('success', 'Student added successfully!');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'studentNumber' => 'required|string|max:20|unique:students',
            'lname' => 'required',
            'fname' => 'required',
            'mi' => 'nullable',
            'email' => 'required|email|unique:students',
            'contactNumber' => 'nullable'
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully!');
    }
}
