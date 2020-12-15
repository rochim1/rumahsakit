<?php

use Illuminate\Database\Seeder;

class satuanobat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuan = array('Pulvis (serbuk)', 'Pulveres', 'Tablet (compressi)', 'Pil (pilulae)', 'Kapsul (capsule)', 'Kaplet (kapsul tablet)', 'Larutan (solutiones)', 'Suspensi (suspensiones)', 'Emulsi (elmusiones)', 'Galenik', 'Ekstrak (extractum)', 'Infusa', 'Imunoserum (immunosera)', 'Salep (unguenta)', 'Suppositoria', 'Obat tetes (guttae)', 'Injeksi (injectiones)');
        foreach ($satuan as $key => $value) {
                $rand_keys_satuan = array_rand($satuan, 1);
                DB::table('satuan_obat')->insert([
                    "nama_satuan" => $satuan[$rand_keys_satuan],
            ]);
        }

    }
}
