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
        // menggunakan faker , dokumentasi : https://github.com/fzaninotto/Faker
        // insert data ke table pegawai menggunakan Faker
        for ($i = 1; $i <= 134; $i++) {
            DB::table('pasien')->insert([
            'rekam_medis'=> "RM-". $faker->isbn10,
            'nama' => $faker->name,
            // 'jenisKelamin' => strval($faker->randomElements(array('L','P'),1)),
            'jenisKelamin' => 'P',
            'NIK' => $faker->isbn10 ,
            'warga_negara' => 'WNA' ,
            // 'agama' => $faker->randomElements(array ('islam','hindu','budha','kristen','islam','katolik'), 1),
            'agama' => "Islam",
            // 'status_pasien' => $faker->randomElements(array ('rawat jalan','rawat inap'), 1), //rawat inap / rawat jalan
            'status_pasien' => "rawat inap", //rawat inap / rawat jalan
            'tanggal_lahir'=> $faker->dateTime('now', null),
            'umur_daftar' => $faker->randomDigit,
            'lebih_bulan' => rand(0,12),
            'email' => $faker->email,
            'telpon' => $faker->e164PhoneNumber,
            'alamat' => $faker->address,
            'kelurahan' => $faker->address,
            'kecamatan' => $faker->stateAbbr,
            'kabupaten' => $faker->state,
            'provinsi' => $faker->city,
            // 'asuransi' => $faker->randomElements(array ('non-asuransi','BPJS'), 1),
            'asuransi' => "BPJS",
            'asuransi' => "BPJS",
            'pekerjaan' => $faker->jobTitle,
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
