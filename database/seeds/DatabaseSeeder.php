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
        // $this->call(usersSeeder::class);
        $this->call(users::class);
    }
}
