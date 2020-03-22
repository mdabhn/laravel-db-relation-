<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'user_id' => 1,
            'name' => 'Project 1',
            'code' => 'Project 1 100',
            'description' => 'This is a Project 1 Project',
        ]);

        Group::create([
            'user_id' => 1,
            'name' => 'Project 2',
            'code' => 'Project 2 200',
            'description' => 'This is a Project 2 Project',
        ]);

        Group::create([
            'user_id' => 2,
            'name' => 'Project 3',
            'code' => 'Project 3 200',
            'description' => 'This is a Project 3 Project',
        ]);

        Group::create([
            'user_id' => 3,
            'name' => 'Project 4',
            'code' => 'Project 4 200',
            'description' => 'This is a Project 4 Project',
        ]);

        Group::create([
            'user_id' => 1,
            'name' => 'Project 5',
            'code' => 'Project 5 200',
            'description' => 'This is a Project 5 Project',
        ]);

        Group::create([
            'user_id' => 4,
            'name' => 'Project 6',
            'code' => 'Project 6 200',
            'description' => 'This is a Project 6 Project',
        ]);

        Group::create([
            'user_id' => 4,
            'name' => 'Project 7',
            'code' => 'Project 7 200',
            'description' => 'This is a Project 7 Project',
        ]);

        Group::create([
            'user_id' => 5,
            'name' => 'Project 8',
            'code' => 'Project 8 200',
            'description' => 'This is a Project 8 Project',
        ]);

        Group::create([
            'user_id' => 2,
            'name' => 'Project 9',
            'code' => 'Project 9 200',
            'description' => 'This is a Project 9 Project',
        ]);

        Group::create([
            'user_id' => 3,
            'name' => 'Project 9',
            'code' => 'Project 9 200',
            'description' => 'This is a Project 9 Project',
        ]);

        Group::create([
            'user_id' => 1,
            'name' => 'Project 10',
            'code' => 'Project 10 200',
            'description' => 'This is a Project 10 Project',
        ]);

        Group::create([
            'user_id' => 4,
            'name' => 'Project 11',
            'code' => 'Project 11 200',
            'description' => 'This is a Project 11 Project',
        ]);

        Group::create([
            'user_id' => 5,
            'name' => 'Project 12',
            'code' => 'Project 12 200',
            'description' => 'This is a Project 12 Project',
        ]);

        Group::create([
            'user_id' => 2,
            'name' => 'Project 13',
            'code' => 'Project 13 200',
            'description' => 'This is a Project 13 Project',
        ]);

        Group::create([
            'user_id' => 1,
            'name' => 'Project 14',
            'code' => 'Project 14 200',
            'description' => 'This is a Project 14 Project',
        ]);

        Group::create([
            'user_id' => 5,
            'name' => 'Project 15',
            'code' => 'Project 15 200',
            'description' => 'This is a Project 15 Project',
        ]);

        Group::create([
            'user_id' => 3,
            'name' => 'Project 15',
            'code' => 'Project 15 200',
            'description' => 'This is a Project 15 Project',
        ]);

        Group::create([
            'user_id' => 1,
            'name' => 'Project 16',
            'code' => 'Project 16 200',
            'description' => 'This is a Project 16 Project',
        ]);

        Group::create([
            'user_id' => 2,
            'name' => 'Project 17',
            'code' => 'Project 17 200',
            'description' => 'This is a Project 17 Project',
        ]);

        Group::create([
            'user_id' => 3,
            'name' => 'Project 18',
            'code' => 'Project 18 200',
            'description' => 'This is a Project 18 Project',
        ]);

        Group::create([
            'user_id' => 1,
            'name' => 'Project 19',
            'code' => 'Project 19 200',
            'description' => 'This is a Project 19 Project',
        ]);

        Group::create([
            'user_id' => 4,
            'name' => 'Project 20',
            'code' => 'Project 20 200',
            'description' => 'This is a Project 20 Project',
        ]);

        Group::create([
            'user_id' => 5,
            'name' => 'Project 21',
            'code' => 'Project 21 200',
            'description' => 'This is a Project 21 Project',
        ]);

        Group::create([
            'user_id' => 1,
            'name' => 'Project 22',
            'code' => 'Project 22 200',
            'description' => 'This is a Project 22 Project',
        ]);
    }
}
