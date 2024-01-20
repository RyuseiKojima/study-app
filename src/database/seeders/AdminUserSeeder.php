<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('admin_users')->insert([
      'name' => 'owner',
      'email' => 'owner@example.com',
      'password' => Hash::make('password'),
      'admin_level' => 1,
    ]);
    DB::table('admin_users')->insert([
      'name' => 'sub',
      'email' => 'sub@example.com',
      'password' => Hash::make('password'),
      'admin_level' => 0,
    ]);
  }
}
