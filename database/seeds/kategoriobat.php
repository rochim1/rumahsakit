<?php

use Illuminate\Database\Seeder;

class kategoriobat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = array('obat bebas', 'obat bebas terbatas', 'obat keras dan psikotropika', 'narkotika', 'tradisional', 'herbal tersetandar', 'fitofarmaka');
        foreach ($kategori as $key => $value) {
            $rand_keys_kategori = array_rand($kategori, 1);
            DB::table('kategoriobat')->insert([
                "nama_kategori" => $kategori[$rand_keys_kategori],
            ]);
        }
    }
}
