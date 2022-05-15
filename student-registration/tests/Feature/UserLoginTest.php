<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_login()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/login', [
            'email'     => 'raychellepagarigan@mail.com',
            'password'  => 'password',
        ]);
 
        $response->assertStatus(302);
    }
}
