<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin1234@gmail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make('123456'),// password
        ]);
    }
}
