<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();

        User::create([
            'id' => 1,
            'name'=>'Admin',
            'email'=>'admin@gmail.com', 
            'email_verified_at' => now(),     
            'mobile' => '9812512512',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'admin',
            'status' => 1,
            'remember_token' => Str::random(10)
        ]);
        
        User::create([
            'id' => 2,
            'name'=>'Abhishek',
            'email'=>'iamdev.abhishek@gmail.com', 
            'email_verified_at' => now(),     
            'mobile' => '9841214211',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'doctor',
            'status' => 1,
            'remember_token' => Str::random(10)
        ]);

        User::factory()->count(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
