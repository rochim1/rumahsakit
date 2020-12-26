<?php

use Illuminate\Database\Seeder;

class cacatfisik extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disability = array('tunarungu', 'tunawicara', 'tunanetra', 'tuna daksa');
        foreach ($disability as $key => $value) {
            DB::table('cacatfisik')->insert([
                'nama_cacat' => $value,
            ]);
        }
    }
}
