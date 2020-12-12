<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class bangsal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $nama = array('ar-rayan','kasturi','ar-rahman','firdaus','al-jamal','as-syifa');
        foreach ($nama as $key) {
            DB::table('bangsal')->insert([
                'bangsal' => $key,
                'created_at' => Carbon::now(),
                ]);
            }

    }
}
