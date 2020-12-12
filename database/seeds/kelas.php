<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class kelas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = array('President Suite','VVIP A', 'VVIP B','VIP A', 'VIP B','kelas I','kelas II', 'kelas III');
        foreach ($kelas as $key) {
        DB::table('kelas')->insert([
            'kelas' => $key,
            'fasilitas' =>'kamar tidur, kamar mandi, sofa, tv',
            'harga' => 200000,
            'created_at' => Carbon::now(),
        ]);
        }
    }
}
