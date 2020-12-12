<?php

use Illuminate\Database\Seeder;

class jadwal_jamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jam_mulai = array('08:00','14:00','21:00');
        $jam_selesai = array('14:00','21:00','08:00');
        for ($i = 0; $i <= 2; $i++) {
            DB::table('jadwaljam')->insert([
                'jam_mulai' => $jam_mulai[$i],
                'jam_selesai' => $jam_selesai[$i],
            ]);
        }
    }
}
