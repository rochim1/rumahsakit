<?php

use Illuminate\Database\Seeder;

class pendidikan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pendidikan = array('SD/MI','SMP/MTS','SMA/SMK/MA','D1','D2','D3','D4','S1', 'S2','S3');
        foreach ($pendidikan as $key => $value) {
            DB::table('pendidikan')->insert([
                "pendidikan" => $value
            ]);
        }
    }
}
