<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedUsers = [
            ['id'=>'1', 'name'=>'Ad Ministrator','email'=>'admin@example.com','password'=>'Password1!'],
            ['id'=>'2', 'name'=>'Colin le Roux','email'=>'colin@gmail.com','password'=>'Password1!'],
            ['id'=>'45', 'name'=>'Jacques d’Carre','email'=>'jacques@example.com','password'=>'Password1!'],
            ['id'=>'46', 'name'=>'Dee Leet','email'=>'dee@example.com','password'=>'Password1!'],
            ['id'=>'47', 'name'=>'Eileen Dover','email'=>'eileen@example.com','password'=>'Password1!'],
            ['id'=>'48', 'name'=>'Booker Holliday','email'=>'booker@example.com','password'=>'Password1!'],
            ['id'=>'49', 'name'=>'Fallon Dover','email'=>'fallon@example.com','password'=>'Password1!'],
            ['id'=>'', 'name'=>'Dee Vine','email'=>'Dee.Vine@example.com','password'=>'Password1!'],
            ['id'=>'', 'name'=>'Lolly Popp','email'=>'Lolly.Popp@example.com','password'=>'Password1!'],
            ['id'=>'', 'name'=>'Penny Lane','email'=>'Penny.Lane@example.com','password'=>'Password1!'],
            ['id'=>'', 'name'=>'Penny Less','email'=>'Penny.Less@example.com','password'=>'Password1!'],
            ['id'=>'', 'name'=>'Skip Dover','email'=>'Skip.Dover@example.com','password'=>'Password1!'],


        ];
        foreach ($seedUsers as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
            ]);
        }
    }
}
