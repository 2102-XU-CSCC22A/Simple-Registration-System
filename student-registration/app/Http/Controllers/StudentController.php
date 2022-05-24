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

    public function getById($param_id)
    {
        $student = Student::getById($param_id);
       
        $data = [
            'id'            => $student->id, 
            'id_number'     => $student->id_number,
            'first_name'    => $student->first_name,
            'middle_name'   => $student->middle_name,
            'last_name'     => $student->last_name,
            'gender'        => $student->gender,
            'birthdate'     => $student->birthdate,
            'phone_no'      => $student->phone_no,
            'email'         => $student->email,
            'address'       => $student->address,
            'course'        => $student->course,
            'year_level'    => $student->year_level,
            'created_at'    => $student->created_at === null ? '' : $student->created_at->format('D, d M Y').date(' | h:i A', strtotime($student->created_at)),
            'updated_at'    => $student->updated_at === null ? '' : $student->updated_at->format('D, d M Y').date(' | h:i A', strtotime($student->updated_at)),
        ];
        
        return response()->json(['data' => $data], 200);
    }
}
