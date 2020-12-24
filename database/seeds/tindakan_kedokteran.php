<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class tindakan_kedokteran extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $umum = array(
                        'Akupunktur',
                        'Infus Vitamin C',
                        'Infus di rumah',
                        'Komposisi Tubuh',
                        'Konsultasi Kesehatan Umum',
                        'Layanan Kunjungan Rumah',
                        'Lilin Telinga',
                        'Medical Check Up',
                        'Medical Check Up Karyawan',
                        'Medical Check Up Visa',
                        'PCR Swab Test',
                        'Pemeriksaan Abdomen',
                        'Perawatan Kulit',
                        'Perawatan Luka',
                        'Rapid Test Virus Corona (COVID-19)',
                        'Senam Tai Chi',
                        'Senam Yoga',
                        'Serologi COVID-19',
                        'Skrining Down Syndrome',
                        'Skrining Skoliosis',
                        'Sleep Study',
                        'Swab Antigen',
                        'Tes BMI',
                        'Tes HIV',
                        'Tes Kebugaran',
                        'Tes Narkoba',
                        'Tes Risiko COVID-19 dengan CT Scan',
                        'Vaksin Difteri',
                        'Vaksin Orang Dewasa');
foreach ($umum as $key => $value) {
    DB::table('tindakan_kedokteran')->insert([
        'id_spesialis' => 22,
        'nama_tindakan' => $value,
        'harga_tindakan' => 20000,
        'keterangan_tindakan' => 'harga dapat berubah sewaktu2',
        'created_at' => Carbon::now()
    ]);
};


        $anak = array(
                        'Bank Stem Cell Bayi',
                        'Fisioterapi Anak',
                        'Konsultasi Alergi Anak',
                        'Konsultasi Kesehatan Anak',
                        'Konsultasi Pernapasan Anak',
                        'Konsultasi Psikologi Anak',
                        'Konsultasi Saraf Anak',
                        'Skrining Tumbuh Kembang Anak',
                        'Tes Pendengaran OAE',
                        'Vaksin Anak',
                        'Vaksin MMR');
        foreach ($anak as $key => $value) {
            DB::table('tindakan_kedokteran')->insert([
                'id_spesialis' => 3,
                'nama_tindakan' => $value,
                'harga_tindakan' => 20000,
                'keterangan_tindakan' => 'harga dapat berubah sewaktu2',
                'created_at' => Carbon::now()
            ]);
        };

        $bedahUmum = array(
                'Bariatric Surgery',
                'Complex Abdominal Wall/Muscle Repairs',
                'Konsultasi Bedah Umum',
                'Operasi Fistel',
                'Operasi Kista Hati dengan Laparoskopi',
                'Operasi Usus Buntu',
                'Penjahitan Luka',
                'Transplantasi Stem Cell');
        foreach ($bedahUmum as $key => $value) {
            DB::table('tindakan_kedokteran')->insert([
                'id_spesialis' => 4,
                'nama_tindakan' => $value,
                'harga_tindakan' => 20000,
                'keterangan_tindakan' => 'harga dapat berubah sewaktu2',
                'created_at' => Carbon::now()
            ]);
        };

        $penyakitDalam = array(
                'Analisa Gas Darah',
                'CT Scan',
                'Cek Asam Urat',
                'Cek Golongan Darah',
                'Cek Kolesterol',
                'CT Scan',
                'Cek Asam Urat',
                'Cek Golongan Darah',
                'Cek Kolesterol',
                'Fungsi Ginjal',
                'Hitung Darah Lengkap',
                'Konsultasi Imunologi',
                'Konsultasi Penyakit Dalam',
                'MRI Scan',
                'Pemeriksaan Feses',
                'Profil Lipid',
                'Profil Lipid',
                'Rontgen Dada',
                'Serologi',
                'Skrining Hepatitis',
                'Terapi Alergi',
                'Tes DNA',
                'Tes Urine',
                'Tes Widal',
                'Uji Elektrolit',
                'Uji Fungsi Hati',
                'Vaksin Hepatitis'

        );
        foreach ($penyakitDalam as $key => $value) {
            DB::table('tindakan_kedokteran')->insert([
                'id_spesialis' => 16,
                'nama_tindakan' => $value,
                'harga_tindakan' => 20000,
                'keterangan_tindakan' => 'harga dapat berubah sewaktu2',
                'created_at' => Carbon::now()
            ]);
        };

        $syaraf = array(

            'Aneursym Coiling',
            'Brain Angiography (DSA)',
            'Brain SPECT',
            'Cephalometry',
            'Deep Brain Stimulation',
            'Dekompresif Kraniektomi',
            'Dementia Management',
            'Elektroensefalografi (EEG)',
            'Elektromiografi',
            'Embolisasi Aneurisma',
            'Endovaskuler',
            'Extracorporeal Shockwave Therapy (ESWT)',
            'Facet Block',
            'IOM (Intra Operational Monitoring)',
            'Konsultasi Parkinson',
            'Konsultasi Penyakit Saraf',

            'Konsultasi Spina Bifida',
            'Konsultasi Stroke ',
            'Neuromodulator',
            'Operasi Saraf Kejepit',
            'PRF dengan C-Arm',

            'PRF dengan Under USG',
            'Pain Management',
            'Pemeriksaan konduksi saraf',
            'Pengobatan Migrain',

            'Pengobatan Penyakit Alzheimer',
            'Perawatan Epilepsi',
            'Perawatan Parkinson',
            'RTMS (Repetitive Trans cranial Magnetic Stimulation)',
            'Rehabilitasi Saraf',
            'Senam Saraf',
            'Spinal Injection Therapy',
            'Terapi Laser Untuk Bell’s palsy',
            'Terapi Neurofeedback',
            'USG Kepala'
        );

        foreach ($syaraf as $key => $value) {
            DB::table('tindakan_kedokteran')->insert([
                'id_spesialis' => 19,
                'nama_tindakan' => $value,
                'harga_tindakan' => 20000,
                'keterangan_tindakan' => 'harga dapat berubah sewaktu2',
                'created_at' => Carbon::now()
            ]);
        };
        $tht = array(
            'BERA (Brainstem Evoked Response Audiometry)',
            'Bedah THT',
            'Endoskopi Telinga',
            'Foto Rontgen THT',
            'Irigasi Telinga',
            'Konsultasi THT',
            'Korpus Alienum THT',
            'Laringektomi',
            'Miringoplasti',
            'Nasal Endoscopic Surgery',
            'Operasi Amandel',
            'Operasi Implan Koklea',
            'Operasi Sinusitis',
            'Radiologi THT',
            'Terapi Laser Untuk Sinusitis',
            'Terapi Oksigen Hiperbarik',
            'Tes Pendengaran',
            'Tympanoplasty');
        foreach ($tht as $key => $value) {
            DB::table('tindakan_kedokteran')->insert([
                'id_spesialis' => 20,
                'nama_tindakan' => $value,
                'harga_tindakan' => 20000,
                'keterangan_tindakan' => 'harga dapat berubah sewaktu2',
                'created_at' => Carbon::now()
            ]);
        };
            DB::table('tindakan_kedokteran')->insert([
                'id_spesialis' => 18,
                'nama_tindakan' => 'kosnsultasi psikologis',
                'harga_tindakan' => 20000,
                'keterangan_tindakan' => 'harga dapat berubah sewaktu2',
                'created_at' => Carbon::now()
            ]);

        $paru = array(
            'Biopsi Paru',
            'Bronkoskopi',
            'Konsultasi Paru-Paru dan Pernapasan',
            'Operasi Pengangkatan Paru',
            'Pengobatan Penyakit Paru  Obstruktif Kronis (PPOK)',
            'Pengobatan TBC',
            'Positive Airway Pressure',
            'Rehabilitasi Paru',
            'Skrining TBC',
            'Tes Fungsi Paru'
        );
        foreach ($paru as $key => $value) {
            DB::table('tindakan_kedokteran')->insert([
                'id_spesialis' => 15,
                'nama_tindakan' => $value,
                'harga_tindakan' => 20000,
                'keterangan_tindakan' => 'harga dapat berubah sewaktu2',
                'created_at' => Carbon::now()
            ]);
        };
        $gigimulut = array(
'Ablasi Gusi',
'Airflo Prep',
'Cabut Gigi',
'Dental Bridge',
'Fluoride Treatment',
'Foto Panoramik Gigi',
'Foto Panoramik Gigi',
'Gigi Palsu',
'Implan Gigi
Invisalign',
'Kosmetik Gigi',
'MSCT Dental Scan',
'Obturator Palatum',
'Pemasangan Crown Gigi',
'Pemasangan Kawat Gigi',
'Pembersihan Gigi',
'Pemeriksaan dan Konsu',
'Pemeriksaan dan Konsultasi  Perawatan Gigi',
'Pemutihan Gigi',
'Pencabutan Akar Gigi',
'Pengobatan Gigi Sensitif',
'Perawatan Akar Gigi',
'Periodontal Treatment',
'Piezo Master Surgery',
'Piezo Master Surgery',
'Restorasi Gigi',
'Rontgen Gigi',
'Scaling Gigi',
'Tambal Gigi',
'Veneer Gigi',
        );
        foreach ($gigimulut as $key => $value) {
            DB::table('tindakan_kedokteran')->insert([
                'id_spesialis' => 5,
                'nama_tindakan' => $value,
                'harga_tindakan' => 20000,
                'keterangan_tindakan' => 'harga dapat berubah sewaktu2',
                'created_at' => Carbon::now()
            ]);
        };

        $mata = array(

'Age-Related Macular Degeneration (AMD) Treatment',
'Angiogram dengan Kontras Fluorescen',
'Bedah Refraktif Untuk Mata',
'Biometrik Mata',
'Foto Fundus Mata',
'Implan Lensa Mata',

'Injeksi Intravitreal',
'Iridoplasti',
'Keratometer',
'LASIK',

'Laser Argon',
'Laser YAG',
'Mata Palsu',
'Operasi Katarak',
'Operasi Mata',

'Operasi Pterigium',
'Operasi Saluran Air Mata',
'Operasi Vitroretina',
'Ophthalmoskop',

'Optical Coherence Tomography (OCT)',
'Pemeriksaan Glaukoma',
'Pemeriksaan Visus Mata',
'Pemeriksaan dan Konsultasi Mata',
'Pemeriksaan dan Konsultasi Mata Anak',
'Pengobatan Ablasio Retina',
'Pengobatan Kalazion',
'Pengobatan Kista Konjungtiva',

'Pengobatan Mata Juling',
'Pengobatan Mata Malas',
'Pengobatan Mata Silinder',
'Pengobatan Retinopati Diabetik',
'Perawatan Glaukoma',

'Presbymax',
'Reparasi Otot Mata',
'Retinal Tear and Detachment Services',
'Slitlamp Biomikroskop',
'Small Incision Lenticule Extraction (SMILE)',
'Tes Buta Warna',
'Tonometri',
'Trabekulektomi',
'Transplantasi Kornea',
'USG Mata',
'Vitrektomi',

        );
        foreach ($mata as $key => $value) {
            DB::table('tindakan_kedokteran')->insert([
                'id_spesialis' => 14,
                'nama_tindakan' => $value,
                'harga_tindakan' => 20000,
                'keterangan_tindakan' => 'harga dapat berubah sewaktu2',
                'created_at' => Carbon::now()
            ]);
        };
    }
}
