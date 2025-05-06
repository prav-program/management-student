<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'student_name' => 'Pravin patel',
            'class_teacher_id' => 1,
            'class' => '10A',
            'admission_date' => '2023-06-01',
            'yearly_fees' => 12000.00,
        ]);

        Student::create([
            'student_name' => 'Brijesh singh',
            'class_teacher_id' => 2,
            'class' => '9B',
            'admission_date' => '2023-05-10',
            'yearly_fees' => 11000.00,
        ]);
    }
}
