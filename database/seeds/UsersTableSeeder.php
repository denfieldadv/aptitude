<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
                'name'     => 'Tony Stark',
                'email'    => 'tony@test.com',
                'password' => Hash::make('test1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'     => 'Bruce Banner',
                'email'    => 'bruce@test.com',
                'password' => Hash::make('test1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'     => 'Natalia Romanova',
                'email'    => 'Natalia@test.com',
                'password' => Hash::make('test1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'     => 'Steve Rogers',
                'email'    => 'steve@test.com',
                'password' => Hash::make('test1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'     => 'Thor Odinson',
                'email'    => 'thor@test.com',
                'password' => Hash::make('test1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
