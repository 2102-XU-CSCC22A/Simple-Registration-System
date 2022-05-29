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

    public function test_show_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    
    public function test_login_submit()
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
