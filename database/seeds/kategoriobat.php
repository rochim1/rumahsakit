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
            DB::table('kategoriobat')->insert([
                "nama_kategori" => $value,
            ]);
        }
    }
}
