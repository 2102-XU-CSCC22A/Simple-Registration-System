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

    public function getAll()
    {
        $student = Student::orderBy('created_at','asc')->get();

        return $student;
    }   

    public function getById($param_id)
    {
        $student = Student::where('id', $param_id)->first();
        
        return $student;
    }

    public function delete($param_id)
    {
        $student = JobPosting::find($param_id)->delete();
        
        return $student;
    }
}