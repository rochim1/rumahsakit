<?php


use Illuminate\Database\Seeder;
// menambahkan fie untuk faker
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Str;

class pasien_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // faker untuk indonesia
        $faker = Faker::create('id_ID');
        $asuransi = array(1,2,3,4);
        $warga = array('WNA','WNI');
        $status = array('rawat inap','rawat jalan', NULL);
        // menggunakan faker , dokumentasi : https://github.com/fzaninotto/Faker
        // insert data ke table pegawai menggunakan Faker
        for ($i = 1; $i <= 434; $i++) {
            $rand_keys = array_rand($asuransi, 1);
            $rand_keyswarga = array_rand($warga, 1);
            $rand_keystatus = array_rand($status, 1);
            DB::table('pasien')->insert([
            'rekam_medis'=> "RM-". $faker->isbn10,
            'nama' => $faker->name,
            'nama_ibu' => $faker->name,
            // 'jenisKelamin' => strval($faker->randomElements(array('L','P'),1)),
            'jenisKelamin' => 'P',
            'NIK' => $faker->isbn10 ,
            'warga_negara' => $warga[$rand_keyswarga] ,
            // 'agama' => $faker->randomElements(array ('islam','hindu','budha','kristen','islam','katolik'), 1),
            'agama' => "Islam",
            // 'status_pasien' => $faker->randomElements(array ('rawat jalan','rawat inap'), 1), //rawat inap / rawat jalan
            'status_pasien' => $status[$rand_keystatus], //rawat inap / rawat jalan
            'tanggal_lahir'=> $faker->dateTime('now', null),
            'umur_daftar' => $faker->randomDigit,
            'lebih_bulan' => rand(0,12),
            'email' => $faker->email,
            'telpon' => $faker->e164PhoneNumber,
            'alamat' => $faker->address,

                // 'kelurahan' => $faker->address,
                // 'kecamatan' => $faker->stateAbbr,
                // 'kabupaten' => $faker->city,
                // 'provinsi' => $faker->state,

                'kelurahan' => 3404120002,
                'kecamatan' => 3404120,
                'kabupaten' => 3404,
                'provinsi' => 34,


            'asuransi' => $asuransi[$rand_keys],
            // 'pekerjaan' => $faker->jobTitle,
            'pekerjaan' => rand(1,6),
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // dapat dikosongi (null)
            'password'=> $faker->password,
                // $table->rememberToken()
                // remember token digunakan untuk fungsi remember me
                // $table->timestamps();
                // 'deleted_at' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
