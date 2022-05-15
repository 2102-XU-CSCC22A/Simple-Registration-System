<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        // Load Default User Admin
        $user = User::create([
            'name' => 'Raychelle Pagarigan',
            'email' => 'raychellepagarigan@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), 
            'remember_token' => Str::random(10),
        ]);
       
        return $user;
    }
}
