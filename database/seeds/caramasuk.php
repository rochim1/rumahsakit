<?php

use Illuminate\Database\Seeder;

class caramasuk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $caramasuk = array('UGD','mandiri','dokter','puskesmas','Rs lain','instalasi lain', 'kasus polisi');
        foreach ($caramasuk as $key => $value) {
            DB::table('caramasuk')->insert([
                "cara_masuk" => $value,
            ]);
        }
    }
}
