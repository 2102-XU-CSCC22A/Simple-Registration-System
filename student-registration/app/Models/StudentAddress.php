<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class StudentAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'block',
        'lot',
        'street',
        'subdivision',
        'building_no',
        'city',
        'barangay',
        'zipcode'
    ];

    public function listStudentAddresses()
    {
        $student_address = StudentAddress::orderBy('created_at','desc')->get();

        return $student_address;
    }

    public function createStudentAddress($request)
    {
        $student_id     = $request['student_id'];
        $block          = $request['block'];
        $lot            = $request['lot'];
        $street         = $request['street'];
        $subdivision    = $request['subdivision'];
        $building_no    = $request['building_no'];
        $city           = $request['city'];
        $barangay       = $request['barangay'];
        $zipcode        = $request['zipcode'];
      
        $student_address = StudentAddress::create([
            'student_id'    => $student_id,
            'block'         => $block,
            'lot'           => $lot,
            'street'        => ucwords($street),
            'subdivision'   => ucwords($subdivision),
            'building_no'   => $building_no,
            'city'          => ucwords($city),
            'barangay'      => ucwords($barangay),
            'zipcode'       => $zipcode,
        ]);

        return $student_address;
    }

    public function editStudent($edit_key)
    {
        $student_address = StudentAddress::where('id', $edit_key)->first();

        return $student_address;
    }

    public function updateStudent($request, $edit_key)
    {
        $student_id     = $request['student_id'];
        $block          = $request['block'];
        $lot            = $request['lot'];
        $street         = $request['street'];
        $subdivision    = $request['subdivision'];
        $building_no    = $request['building_no'];
        $city           = $request['city'];
        $barangay       = $request['barangay'];
        $zipcode        = $request['zipcode'];
      
        $student_address = StudentAddress::where('id', $edit_key)->update([
            'student_id'    => $student_id,
            'block'         => $block,
            'lot'           => $lot,
            'street'        => ucwords($street),
            'subdivision'   => ucwords($subdivision),
            'building_no'   => $building_no,
            'city'          => ucwords($city),
            'barangay'      => ucwords($barangay),
            'zipcode'       => $zipcode,
        ]);

        return $student_address;
    }

    public function deleteStudentAddress($request)
    {
        $delete_key = $request['delete_key'];
        $student_address = StudentAddress::find($delete_key)->delete();

        return $student_address;
    }
}
