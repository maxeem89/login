<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MakeDummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([[
            'name' => 'ahmed',
            'email' => 'ahmed.example@gmail.com',
            'mobile' => '07894561',
            'gender' => 'male',
            'barithday' => '2000-1-1',
            'image' => '1159073458.jpeg',
            'password' => Hash::make('123456789'),
        ], [
            'name' => 'ali',
            'email' => 'ali.example@gmail.com',
            'mobile' => '07845423',
            'gender' => 'male',
            'barithday' => '2000-1-1',
            'image' => '1159073458.jpeg',
            'password' => Hash::make('Ab8756421'),
        ], [
            'name' => 'khalid',
            'email' => 'khalid.example@gmail.com',
            'mobile' => '07634567',
            'gender' => 'male',
            'barithday' => '2000-1-1',
            'image' => '1159073458.jpeg',
            'password' => Hash::make('cd6789123'),
        ],
        [
            'name' => 'sara',
            'email' => 'sara.example@gmail.com',
            'mobile' => '07653245',
            'gender' => 'female',
            'barithday' => '2000-1-1',
            'image' => '1159073458.jpeg',
            'password' => Hash::make('ef123456'),
        ], [
            'name' => 'saly',
            'email' => 'saly.example@gmail.com',
            'mobile' => '07984355',
            'gender' => 'female',
            'barithday' => '2000-1-1',
            'image' => '1159073458.jpeg',
            'password' => Hash::make('gg123456'),
        ], [
            'name' => 'katy',
            'email' => 'katy.example@gmail.com',
            'mobile' => '0798634541',
            'gender' => 'female',
            'barithday' => '2000-1-1',
            'image' => '1159073458.jpeg',
            'password' => Hash::make('jj123456'),
        ], [
            'name' => 'jone',
            'email' => 'jone.example@gmail.com',
            'mobile' => '0798634545',
            'gender' => 'male',
            'barithday' => '2000-1-1',
            'image' => '1159073458.jpeg',
            'password' => Hash::make('lk123456'),
        ], [
            'name' => 'mike',
            'email' => 'mike.example@gmail.com',
            'mobile' => '0798634546',
            'gender' => 'male',
            'barithday' => '2000-1-1',
            'image' => '1159073458.jpeg',
            'password' => Hash::make('aa123456'),
        ], [
            'name' => 'khaleel',
            'email' => 'khaleel.example@gmail.com',
            'mobile' => '0798634548',
            'gender' => 'male',
            'barithday' => '2000-1-1',
            'image' => '1159073458.jpeg',
            'password' => Hash::make('kk@123456'),
        ], [
            'name' => 'adel',
            'email' => 'adel.example@gmail.com',
            'mobile' => '0798634547',
            'gender' => 'male',
            'barithday' => '2000-1-1',
            'image' => '1159073458.jpeg',
            'password' => Hash::make('rrr123456'),
        ]]);
    }
}
