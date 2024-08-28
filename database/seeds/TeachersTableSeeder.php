<?php

use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->delete();
        $teacher = new Teacher();
        $teacher->Name = ['ar' => 'احمد', 'en' => 'Ahmed'];
        $teacher->email = 'Ahmed_Ibrahim@yahoo.com';
        $teacher->password = Hash::make('12345678');
        $teacher->Specialization_id = Specialization::all()->unique()->random()->id;
        $teacher->gender_id = 1;
        $teacher->Joining_Date = date('2022-01-01');
        $teacher->Address = 'Lermoos - Tirol';
        $teacher->save();
    }
}
