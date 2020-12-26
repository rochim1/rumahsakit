<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class asuransi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $asuransi = array('BPJS', 'manulife', 'AXA', 'Alianz');
        foreach ($asuransi as $key => $value) {
            DB::table('asuransi')->insert([
                'nama_asuransi' => $value,
                'telpon_asuransi' => $faker->e164PhoneNumber,
                'email' => $faker->email,
            ]);
        }
    }
}
