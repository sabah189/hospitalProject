<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Database\DatabaseManager;
use Illuminate\Contracts\Hashing\Hasher;
use Carbon\Carbon;

class NurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'title' => 'Mr',
            'name' => 'sabah',
            'username' => 'sabah',
            'email' => 'sabahboudia10@gmail.com',
            'password' => \Hash::make('sabah'),
            'gender' => 'F',
            'dob' => \Carbon\Carbon::now()
        ]);
    }
}
