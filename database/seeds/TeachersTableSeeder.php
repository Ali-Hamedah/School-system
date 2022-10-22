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
        $students = new Teacher();
        $students->name = ['ar' => 'اليزابيث', 'en' => 'Elisabeth'];
        $students->email = 'Ahmed_Ibrahim@yahoo.com';
        $students->password = Hash::make('12345678');
        $students->Specialization_id = Specialization::all()->unique()->random()->id;
        $students->gender_id = 1;
        $students->Joining_Date = date('2022-01-01');
        $students->Address = 'Lermoos - Tirol';
        $students->save();
    }
}
