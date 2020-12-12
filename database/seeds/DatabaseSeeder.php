<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // mendefinisikan seeder yang akan dijalankan
        // user admin
        $this->call(usersSeeder::class);
        $this->call(pasien_seeder::class);
        $this->call(spesialis::class);
        $this->call(dokterSeed::class);
        $this->call(jadwal_jamSeeder::class);
        $this->call(jabatan::class);
        $this->call(bangsal::class);
        $this->call(kelas::class);
        $this->call(kamar::class);
    }
}
