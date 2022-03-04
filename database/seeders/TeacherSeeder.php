<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teacher')->insert([
            ['ReportingTeacher' => 'John'],
            ['ReportingTeacher' => 'James'],
            ['ReportingTeacher' => 'Robert'],
            ['ReportingTeacher' => 'William'],
            ['ReportingTeacher' => 'Andrew'],
            ['ReportingTeacher' => 'Dennis'],
            ['ReportingTeacher' => 'Roy'],
        ]);
    }
}
