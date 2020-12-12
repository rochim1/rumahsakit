<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class jabatan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = array('direktur','wakil direktur','administrasi dan umum', 'keuangan', 'bina program dan publikasi', 'pelayanan medis', 'pelayanan keperawatan', 'pelayanan penunjang', 'jabatan fungsional' );
        for ($i = 0; $i < 9 ; $i++) {
            DB::table('jabatan')->insert([
                'jabatan' => $input[$i],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
