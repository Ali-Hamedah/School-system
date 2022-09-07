<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = User::create([
            'name' => 'Ali Hamedah',
            'email' => 'admin44@gmail.com',
            'email_verified_at' => null,
            'password' => bcrypt('123456'),

        ]);

    }
}
