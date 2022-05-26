<?php

namespace Tests\Unit;

use Tests\TestCase;
use Student;

class StudentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_all_student()
    {
        $response = $this->get('/students');

        $response->assertStatus(302);
    }

    public function test_create_student()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/login', [
            'email'     => 'raychellepagarigan@mail.com',
            'password'  => 'password',
        ]);
 
        $response->assertStatus(302);

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/student/create', [
            'id_number' => '2011001122',
            'first_name' => 'Jones',
            'middle_name' => 'Grego',
            'last_name' => 'Sally',
            'suffix' => 'Jr.',
            'gender' => '1',
            'birthdate' => '01-Jan-2001',
            'phone_no' => '09123456780',
            'email' => 'sallyjones@gmail.com',
            'address' => 'Mars Tavern Street, Jorge Building, Floor 2 - Room 201',
            'course' => 'BS Computer Science',
            'year_level' => '1',
        ]);

        $response->assertStatus(302);
    }
}
