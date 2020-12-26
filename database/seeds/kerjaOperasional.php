<?php

use Illuminate\Database\Seeder;

class kerjaOperasional extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kerja = array('perawat', 'cleaning service', 'penunjang medis', 'komite medis', 'pemeriksaan internal', 'administrasi umum', 'kasir', 'apoteker');
        foreach ($kerja as $key => $value) {
            DB::table('pekerjaan_OperasionalRS')->insert([
                'pekerjaan_operasional' => $value,
                'job_desk' => 'melayani pasien ',
            ]);
        }
    }
}
