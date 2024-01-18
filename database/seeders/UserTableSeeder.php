<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            //admin
            [
                'name'          => 'Admin',
                'username'      => 'admin',
                'phone'         => '01213',
                'email'         => 'admin@gmail.com',
                'password'      => Hash::make('111'),
                'role'          => 'admin',
                'status'        => '1',
            ],

            //instructor
            [
                'name'          => 'Instructor',
                'username'      => 'instructor',
                'phone'         => '01214',
                'email'         => 'instructor@gmail.com',
                'password'      => Hash::make('111'),
                'role'          => 'instructor',
                'status'        => '1',
            ],

            //user
            [
                'name'          => 'User',
                'username'      => 'user',
                'phone'         => '01215',
                'email'         => 'user@gmail.com',
                'password'      => Hash::make('111'),
                'role'          => 'user',
                'status'        => '1',
            ]
        ]);
    }
}
