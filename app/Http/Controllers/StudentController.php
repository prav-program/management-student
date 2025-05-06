<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // List Students (with search and pagination)
    public function index(Request $request)
    {
        $search = $request->input('search');

        $students = Student::with('teacher')
            ->when($search, function ($query, $search) {
                return $query->where('student_name', 'like', "%{$search}%")
                             ->orWhere('class', 'like', "%{$search}%");
            })
            ->whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('students.index', compact('students'));
    }

    // Show Create Form
    public function create()
    {
        $teachers = Teacher::all();
        return view('students.create', compact('teachers'));
    }

    // Store New Student
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'class' => 'required|string|max:100',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
            'class_teacher_id' => 'required|exists:teachers,id',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $teachers = Teacher::all();
        return view('students.edit', compact('student', 'teachers'));
    }

    // Update Student
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'class' => 'required|string|max:100',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
            'class_teacher_id' => 'required|exists:teachers,id',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Soft Delete Student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student soft deleted successfully!');
    }
}
