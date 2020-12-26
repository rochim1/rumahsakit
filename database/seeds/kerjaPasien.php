<?php

use Illuminate\Database\Seeder;

class kerjaPasien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kerja = array('pelajar/mahasiswa', 'PNS','tentara','buruh', 'polisi', 'lain-lain');
        foreach ($kerja as $key => $value) {
            DB::table('pekerjaan_pasien')->insert([
                'pekerjaan_pasien' => $value,
            ]);
        }
    }
}
