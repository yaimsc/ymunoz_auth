<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'id' => '2',
        'name' => 'Yaiza',
        'email' => 'yaiza@yaiza.com',
        'password' => '$2y$10$qOEXC04N8ItVZ8gy.Uq/guJPh.LTJ/SFIV1KaJBuKll3fobphiM6O', //contraseña es 123456
        'created_at' => '2019-01-27 18:55:17',
        'updated_at' => '2019-01-27 18:55:17',
      ]);

      DB::table('users')->insert([
        'id' => '3',
        'name' => 'Arantxa',
        'email' => 'arantxa@arantxa.com',
        'password' => '$2y$10$qOEXC04N8ItVZ8gy.Uq/guJPh.LTJ/SFIV1KaJBuKll3fobphiM6O', //contraseña es 123456
        'created_at' => '2019-01-27 18:55:17',
        'updated_at' => '2019-01-27 18:55:17',
      ]);
    }
}
