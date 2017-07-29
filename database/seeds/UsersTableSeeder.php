<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Admin Betawaran',
          'email' => 'admin@my.tuta',
          'username' => 'adminbetawaran',
          'phone' => '082155000851',
          'city_id' => 1,
          'password' => bcrypt('admin'),
          'role' => 'admin',
      ]);
    }
}
