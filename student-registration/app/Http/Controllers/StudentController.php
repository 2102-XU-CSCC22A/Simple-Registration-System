<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Student;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function getAllStudent()
    {
        $students = Student::getAllStudent();

        $data = [];
        foreach($students as $s => $student)
        {
            $data[] = [
                'id'            => $student->id, 
                'id_number'     => $student->id_number,
                'first_name'    => $student->first_name,
                'middle_name'   => $student->middle_name,
                'suffix'        => $student->suffix,
                'last_name'     => $student->last_name,
                'course'        => $student->course,
                'year_level'    => $student->year_level,
                'created_at'    => $student->created_at === null ? '' : $student->created_at->format('D, d M Y').date(' | h:i A', strtotime($student->created_at)),
                'updated_at'    => $student->updated_at === null ? '' : $student->updated_at->format('D, d M Y').date(' | h:i A', strtotime($student->updated_at)),
            ];
        }
        
        return response()->json(['data' => $data], 200);
    }

    public function getByIdStudent($param_id)
    {
        $student = Student::getByIdStudent($param_id);
       
        $data = [
            'id'            => $student->id, 
            'id_number'     => $student->id_number,
            'first_name'    => $student->first_name,
            'middle_name'   => $student->middle_name,
            'suffix'        => $student->suffix,
            'last_name'     => $student->last_name,
            'gender'        => $student->gender,
            'birthdate'     => $student->birthdate === null ? '' : $student->created_at->format('d-M-Y'),
            'phone_no'      => $student->phone_no,
            'email'         => $student->email,
            'address'       => $student->address,
            'course'        => $student->course,
            'year_level'    => $student->year_level,
            'created_at'    => $student->created_at === null ? '' : $student->created_at->format('D, d M Y').date(' | h:i A', strtotime($student->created_at)),
            'updated_at'    => $student->updated_at === null ? '' : $student->updated_at->format('D, d M Y').date(' | h:i A', strtotime($student->updated_at)),
        ];
        
        return response()->json(['data' => $data,], 200);
    }

    public function createStudent(Request $request) 
    {
        $request->validate([
            'id_number'   => ['required', 'string', 'max:20', Rule::unique('students')], 
            'first_name'  => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'gender'      => ['required', 'string', 'max:2'],
            'birthdate'   => 'required|date_format:d-M-Y|after_or_equal:1920-01-01',
            'phone_no'    => ['required', 'regex:/(09)[0-9]{9}/', Rule::unique('students')],
            'email'       => ['required', 'email', Rule::unique('students')], 
            'address'     => ['required', 'string', 'max:255'],
            'course'      => ['required', 'string', 'max:255'],
            'year_level'  => ['required', 'string', 'max:2'],
        ]);
    
        $student = Student::createStudent($request);
        
        return response()->json([
            'reponse' => $student,
            'request' => $request->all(),
            'message' => 'created student successfully'
        ], 200);  
    }

    public function updateStudent(Request $request, $param_id) 
    {
        $request->validate([
            'id_number'   => ['required', 'string', 'max:20', Rule::unique('students')->ignore($param_id)],
            'first_name'  => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'gender'      => ['required', 'string', 'max:2'],
            'birthdate'   => 'required|date_format:d-M-Y|after_or_equal:1920-01-01',
            'phone_no'    => ['required', 'regex:/(09)[0-9]{9}/', Rule::unique('students')->ignore($param_id)],
            'email'       => ['required', 'email', Rule::unique('students')->ignore($param_id)],
            'address'     => ['required', 'string', 'max:255'],
            'course'      => ['required', 'string', 'max:255'],
            'year_level'  => ['required', 'string', 'max:2'],
        ]);

        $student = Student::updateStudent($request, $param_id);

        return response()->json([
            'reponse' => $student,
            'request' => $request->all(),
            'message' => 'created student successfully'
        ], 200);  
    }

    public function deleteStudent($param_id)
    {
        $student = Student::deleteStudent($param_id);
        
        return response()->json([
            'reponse' => $student,
            'message' => 'student deleted!'
        ], 200);  
    }
}
