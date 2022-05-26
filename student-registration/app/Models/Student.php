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
        'address',
        'course',
        'year_level'
    ];

    public function getAllStudent()
    {
        $student = Student::orderBy('created_at','asc')->get();

        return $student;
    }   

    public function getByIdStudent($param_id)
    {
        $student = Student::where('id', $param_id)->first();
        
        return $student;
    }

    public function createStudent($request)
    {
        $student = Student::create([
            'id_number'   => ['id_number'],
            'first_name'  => ucwords($request['first_name']),
            'middle_name' => ucwords($request['middle_name']),
            'last_name'   => ucwords($request['last_name']),
            'gender'      => ['gender'],
            'birthdate'   => ['birthdate'],
            'phone_no'    => ['phone_no'],
            'email'       => ['email'],
            'address'     => ucwords($request['address']),
            'course'      => ucwords($request['course']),
            'year_level'  => ['year_level'],
        ]);

        return $student;
    }

    public function updateStudent($request, $param_id)
    {
        $student = Student::where('id', $param_id)->update([
            'id_number'   => ['id_number'],
            'first_name'  => ucwords($request['first_name']),
            'middle_name' => ucwords($request['middle_name']),
            'last_name'   => ucwords($request['last_name']),
            'gender'      => ['gender'],
            'birthdate'   => ['birthdate'],
            'phone_no'    => ['phone_no'],
            'email'       => ['email'],
            'address'     => ucwords($request['address']),
            'course'      => ucwords($request['course']),
            'year_level'  => ['year_level'],
        ]);

        return $student;
    }


    public function deleteStudent($param_id)
    {
        // $student = Student::where('id', $param_id)->delete();
        $student = Student::first($param_id)->delete();
       
        return $student;
    }
}