<?php

use Illuminate\Database\Seeder;

class bahasa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bahasa = array('Bahasa Indonesia','jawa','inggris','melayu');
        foreach ($bahasa as $key => $value) {
            DB::table('bahasa')->insert([
                'nama_bahasa' => $value,
            ]);
        }
    }
}
