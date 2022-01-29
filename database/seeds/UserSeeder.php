<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'email' => 'example@gmail.com',
            'phone' => '9876543210',
            'address' => 'address',
            'password' => Hash::make('secret'),
        ]);
    }
}
