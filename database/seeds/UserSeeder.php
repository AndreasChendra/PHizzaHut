<?php

use Illuminate\Database\Seeder;

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
                'role_id' => 1,
                'name' => 'Andreas Chendra', 
                'email' => 'andreas.chen@admin.com', 
                'password' => bcrypt('andreas123'), 
                'address' => 'Jl Siak', 
                'phone_number' => '085632415228', 
                'gender' => 'Male'
            ],

            [
                'role_id' => 1,
                'name' => 'Aitisen', 
                'email' => 'aitisen@admin.com', 
                'password' => bcrypt('aitisen123'), 
                'address' => 'Jl Jakarta Utara', 
                'phone_number' => '081256324856', 
                'gender' => 'Male'
            ],

            [
                'role_id' => 1,
                'name' => 'Jackie', 
                'email' => 'jackie@admin.com', 
                'password' => bcrypt('jackie123'), 
                'address' => 'Jl Jakarta Barat', 
                'phone_number' => '089785632456', 
                'gender' => 'Male'
            ],

            [
                'role_id' => 2,
                'name' => 'Budi', 
                'email' => 'budi@member.com', 
                'password' => bcrypt('budi123'), 
                'address' => 'Jl Jakarta Timur', 
                'phone_number' => '083641298720', 
                'gender' => 'Male'
            ],

            [
                'role_id' => 2,
                'name' => 'Fransisca', 
                'email' => 'fransisca@member.com', 
                'password' => bcrypt('fransisca123'), 
                'address' => 'Jl Kalimantan Timur', 
                'phone_number' => '085530021880', 
                'gender' => 'Female'
            ],

            [
                'role_id' => 2,
                'name' => 'Fortuna', 
                'email' => 'fortuna@member.com', 
                'password' => bcrypt('fortuna123'), 
                'address' => 'Jl Jawa Barat', 
                'phone_number' => '086395512665', 
                'gender' => 'Female'
            ],

        ]);
    }
}
