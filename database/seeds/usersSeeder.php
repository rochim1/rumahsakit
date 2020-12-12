<?php

use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('admin')->insert([
        	'nama' => 'Rochim',
        	'alamat' => 'Yogyakarta',
        	'telpon' => '082154441119',
        	'email' => 'mamadanjar@gmail.com',
        	'password' => 'Zettaku123',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('admin')->insert([
        	'nama' => 'Annisa',
        	'alamat' => 'Yogyakarta',
        	'telpon' => '082154441119',
        	'email' => 'mamadanjar1@gmail.com',
        	'password' => '12345678',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => NULL
            // memakai null dengan tidak mendefinisikan sama2 bisa untuk selain type2 char tentunya
        ]);

    }
}
