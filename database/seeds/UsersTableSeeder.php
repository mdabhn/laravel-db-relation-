<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'hossain',
            'email' => 'h@h',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'hossain',
            'email' => 'hh@h',
            'password' => bcrypt('password')
        ]);
    }
}
