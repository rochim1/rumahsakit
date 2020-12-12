<?php

use Illuminate\Database\Seeder;
// menambahkan fie untuk faker
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Str;

class dokterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $input = array("L", "P");
    //     $input_spesialis = array(
    // "Klinik Vaksin","Poli Akupuntur Medic","Poli Anak","Poli Bedah","Poli Gigi","Poli Gigi Anak","Poli Gizi",
    // "Poli Jantung","Poli Kandungan","Poli Kedokteran Olahraga","Poli Klinik Morula","Poli Klinik Kulit dan Kelamin",
    // "Poli Laktasi","Poli Mata","Poli Paru","Poli Penyakit Dalam","Poli Psikiater","Poli Psikologi",
    // "Poli Syaraf","Poli Telinga Hidung Tenggorokan","Poli Tumbuh Kembang","Poli Umum",);


       for ($i=0; $i < 10; $i++) {
            $rand_keys = array_rand($input, 1);
            // $rand_spesialis = array_rand($input_spesialis, 1);
            DB::table('dokter')->insert([
                'nama_dokter' => "Dr. ".$faker->name,
                'NIK' => $faker->isbn10,
                'agama' => "Islam",
                'nomor_str' => $faker->isbn10,
                'email' => $faker->email,
                'telpon' => $faker->e164PhoneNumber,
                'password' => $faker->password,
                'jenis_kelamin' => $input[$rand_keys],
                'universitas' => "Amikom",
                'tanggal_lahir' => $faker->dateTime('now', null),
                'spesialis' => rand(1, 22),
                'alamat' => $faker->address,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
       }
    }
}
