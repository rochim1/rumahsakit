<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class suplier extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            # code...
            $faker = Faker::create('id_ID');
            DB::table('suplier')->insert([
                "nama_suplier" => "PT"." ".$faker->name,
                "telp_suplier" => $faker->e164PhoneNumber,
                "email_suplier" => $faker->email,
                "alamat_suplier" => $faker->address,

                ]);
            }
    }
}
