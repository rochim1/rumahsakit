<?php

use Illuminate\Database\Seeder; 
// menambahkan fie untuk faker
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class users extends Seeder
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
    	for($i = 1; $i <= 200; $i++){
    		DB::table('users')->insert([
    			'nama' => $faker->name,
                'alamat' => $faker->address,
                'telpon' => $faker->e164PhoneNumber,
                'email' => $faker->email,
                // 'email_verified_at' => $faker->iso8601($max = 'now'), gak bisa salah format
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => $faker->password,
                // 'password' =>  Hash::make('password', ['rounds' => 12,]),
                // 'remember_token' => rand(),
                // 'remember_token' => csrf_token(), tidak bisa
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    		]);
 
        }
    }
}
