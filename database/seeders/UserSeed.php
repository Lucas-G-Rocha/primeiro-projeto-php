<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Romario',
            'email' => 'romario@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
