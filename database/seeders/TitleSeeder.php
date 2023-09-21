<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('titles')->delete();

        $titles = array(
            array('code' => 'Mr.', 'name' => 'Mr.'),
            array('code' => 'Mrs.', 'name' => 'Mrs.'),
            array('code' => 'Miss', 'name' => 'Miss'),
            array('code' => 'Dr.', 'name' => 'Dr.'),
            array('code' => 'Ms.', 'name' => 'Ms.'),
            array('code' => 'Prof.', 'name' => 'Prof.'),
        );

        DB::table('titles')->insert($titles);
    }
}
