<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Student;

class StudentController extends Controller
{
    public function index()
    {
        return view('template.students');
    }

    public function getAll()
    {
        $students = Student::getAll();

        $data = [];
        foreach($students as $s => $student)
        {
            $data[] = [
                'id'            => $student->id, 
                'id_number'     => $student->id_number,
                'first_name'    => $student->first_name,
                'middle_name'   => $student->middle_name,
                'last_name'     => $student->last_name,
                'course'        => $student->course,
                'year_level'    => $student->year_level,
            ];
        }
        
        return response()->json(['data' => $data], 200);
    }
}
