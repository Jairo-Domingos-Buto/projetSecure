<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Jairo Buto',
            'role'=>'admin',
            'email'=>'jairobuto03@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

    }
}
