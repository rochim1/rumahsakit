<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class kamar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = array(true,false);
for ($i=0; $i < 40; $i++) {
    $rand_keys = array_rand($status, 1);
    DB::table('kamar')->insert([
        'nama_kamar' => 'KM-'.$i,
        'kelas' => rand(1, 8),
        'bangsal' => rand(1,4),
        'status' => $status[$rand_keys],
        'created_at' => Carbon::now(),
        ]);
    }
    }
}
