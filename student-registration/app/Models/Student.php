<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_number',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'birthdate',
        'phone_no',
        'email',
        'course',
        'year_level'
    ];

    public function listStudents()
    {
        $students = Student::orderBy('created_at','desc')->get();

        return $students;
    }

    public function createStudent($request)
    {
        $id_number      = $request['id_number'];
        $first_name     = $request['first_name'];
        $middle_name    = $request['middle_name'];
        $last_name      = $request['last_name'];
        $gender         = $request['gender'];
        $birthdate      = $request['birthdate'];
        $phone_no       = $request['phone_no'];
        $email          = $request['email'];
        $course         = $request['course'];
        $year_level     = $request['year_level'];
      
        $student = Student::create([
            'id_number'     => ucwords($id_number),
            'first_name'    => ucwords($first_name),
            'middle_name'   => ucwords($middle_name),
            'last_name'     => ucwords($last_name),
            'gender'        => $gender,
            'birthdate'     => $birthdate,
            'phone_no'      => $phone_no,
            'email'         => $email,
            'course'        => ucwords($course),
            'year_level'    => $year_level,
        ]);

        return $student;
    }

    public function editStudent($edit_key)
    {
        $student = Student::where('id', $edit_key)->first();

        return $student;
    }

    public function updateStudent($request, $edit_key)
    {
        $id_number      = $request['id_number'];
        $first_name     = $request['first_name'];
        $middle_name    = $request['middle_name'];
        $last_name      = $request['last_name'];
        $gender         = $request['gender'];
        $birthdate      = $request['birthdate'];
        $phone_no       = $request['phone_no'];
        $email          = $request['email'];
        $course         = $request['course'];
        $year_level     = $request['year_level'];
      
        $student = Student::where('id', $edit_key)->update([
            'id_number'     => ucwords($id_number),
            'first_name'    => ucwords($first_name),
            'middle_name'   => ucwords($middle_name),
            'last_name'     => ucwords($last_name),
            'gender'        => $gender,
            'birthdate'     => $birthdate,
            'phone_no'      => $phone_no,
            'email'         => $email,
            'course'        => ucwords($course),
            'year_level'    => $year_level,
        ]);

        return $student;
    }

    public function deleteStudent($request)
    {
        $delete_key = $request['delete_key'];
        $student = Student::find($delete_key)->delete();

        return $student;
    }
}