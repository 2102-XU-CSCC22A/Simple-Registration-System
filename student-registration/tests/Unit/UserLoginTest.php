<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserLoginTest extends TestCase
{
    /**
     * A basic unit test example.
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
