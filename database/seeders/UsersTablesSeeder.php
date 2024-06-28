<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin 1',
            'email' => 'admin1@adm.com',
            'password' => Hash::make('admin1pass'),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'name' => 'Admin 2',
            'email' => 'admin2@adm.com',
            'password' => Hash::make('admin2pass'),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'name' => 'Hadid Tamir',
            'email' => 'karyawan1@adm.com',
            'password' => Hash::make('karyawan1pass'),
            'is_admin' => false
        ]);

        DB::table('users')->insert([
            'name' => 'Wahyu Pratama',
            'email' => 'karyawan2@adm.com',
            'password' => Hash::make('karyawan2pass'),
            'is_admin' => false
        ]);
    }
}
