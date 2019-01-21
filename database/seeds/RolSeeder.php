<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
          'id' => 1,
          'nombre' => 'normal'
        ]);

        DB::table('rols')->insert([
          'id' => 2,
          'nombre' => 'admin'
        ]); 
    }
}
