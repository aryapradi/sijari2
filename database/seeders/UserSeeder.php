<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 1,
               
            ],
            [
                'name' => 'AdminBekasi',
                'email' => 'adminbekasi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 2,
  
            ],
            [
                'name' => 'AdminDepok',
                'email' => 'admindepok@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 2,
         
            ]
        ]);
    }
}

