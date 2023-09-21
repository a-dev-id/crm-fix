<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        $users = array(
            array('name' => 'Administrator', 'email' => 'admin@admin.com', 'password' => '$2a$12$iza3ezLI/7hEwVBlHM6z3u1VTz1kR1FvxG0cMdssqTbJp5hK0iPnS'),
        );

        DB::table('users')->insert($users);
    }
}
