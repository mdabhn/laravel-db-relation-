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
            'name' => 'Member 1',
            'email' => 'm@1',
            'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'Member 2',
            'email' => 'm@2',
            'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'Member 3',
            'email' => 'm@3',
            'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'Member 4',
            'email' => 'm@4',
            'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'Member 5',
            'email' => 'm@5',
            'password' => bcrypt('123')
        ]);
    }
}
