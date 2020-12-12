<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class spesialis extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input_spesialis = array(
            "Klinik Vaksin", "Poli Akupuntur Medic", "Poli Anak", "Poli Bedah", "Poli Gigi", "Poli Gigi Anak", "Poli Gizi",
            "Poli Jantung", "Poli Kandungan", "Poli Kedokteran Olahraga", "Poli Klinik Morula", "Poli Klinik Kulit dan Kelamin",
            "Poli Laktasi", "Poli Mata", "Poli Paru", "Poli Penyakit Dalam", "Poli Psikiater", "Poli Psikologi",
            "Poli Syaraf", "Poli Telinga Hidung Tenggorokan", "Poli Tumbuh Kembang", "Poli Umum",
        );
        for ($i=0; $i < sizeof($input_spesialis); $i++) {
             DB::table('spesialis')->insert([
                 'spesialis' => $input_spesialis[$i],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
             ]);
        }
    }
}
