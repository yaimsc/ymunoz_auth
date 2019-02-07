<?php

use Illuminate\Database\Seeder;

class RolsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol_user')->insert([
          'rol_id' => '1',
          'user_id' => '2'
        ]);

        DB::table('rol_user')->insert([
          'rol_id' => '2',
          'user_id' => '1'
        ]);

        DB::table('rol_user')->insert([
          'rol_id' => '3',
          'user_id' => '1'
        ]);
    }
}
