<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => 'Admin 1',
            'email' => 'admin1@adm.com',
            'password' => Hash::make('admin1pass'),
            'is_admin' => true,
            'remember_token' => Str::uuid(),
            'created_at' => date('Y-m-d  H:i:s', time()+7*3600)
        ]);

        DB::table('users')->insert([
            'nama' => 'Admin 2',
            'email' => 'admin2@adm.com',
            'password' => Hash::make('admin2pass'),
            'is_admin' => true,
            'remember_token' => Str::uuid(),
            'created_at' => date('Y-m-d  H:i:s', time()+7*3600)
        ]);

        DB::table('users')->insert([
            'nama' => 'Hadid Tamir',
            'email' => 'karyawan1@adm.com',
            'password' => Hash::make('karyawan1pass'),
            'is_admin' => false,
            'remember_token' => Str::uuid(),
            'created_at' => date('Y-m-d  H:i:s', time()+7*3600)
        ]);

        DB::table('users')->insert([
            'nama' => 'Wahyu Pratama',
            'email' => 'karyawan2@adm.com',
            'password' => Hash::make('karyawan2pass'),
            'is_admin' => false,
            'remember_token' => Str::uuid(),
            'created_at' => date('Y-m-d  H:i:s', time()+7*3600)
        ]);
    }
}
