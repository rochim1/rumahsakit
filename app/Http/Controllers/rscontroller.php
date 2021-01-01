<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use\App\pasien;
use Illuminate\Support\Facades\Storage;
use\App\dokterModel;

// request
use  App\Http\Requests\doktervalid;
use  App\Http\Requests\doktervalidupdate;
class rscontroller extends Controller
{
    public function test(Request $request){
        // json_decode($request->all());
        // json_decode($request->getContent());
        $asuransi = $request->asuransi;
        return response()->json($asuransi);
    }
    public function rekmed(){
        $id_pasien = DB::table('pasien')->select('id_pasien')->orderByDesc('id_pasien')->first();
        $hasil = "RM-".date("Ydm").'-'.$id_pasien->id_pasien;
        return $hasil;
    }
    public function regpasien(){
        $dataSpesialis = $this->dataSpesialis();
        $pekerjaanPasien = DB::table('pekerjaan_pasien')->select()->get();
        $asuransi = DB::table('asuransi')->select()->get();

        // $jadwaljam = DB::table('jadwaljam')->select()->get();

        $cacat = DB::table('cacatfisik')->select()->get();
        $bahasa = DB::table('bahasa')->select()->get();
        $id_pasien = $this->rekmed();
        return view('admin.pasien.tambahpasien', compact('id_pasien', 'dataSpesialis','cacat','asuransi', 'bahasa','pekerjaanPasien'));
    }

    public function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, count($alphabet)-1);
            $pass[$i] = $alphabet[$n];
        }
        return $pass;
    }
    public function editPasien($id_pasien){
        $dataPasien = pasien::where('id_pasien',$id_pasien)->get();
        return view('admin.pasien.updatePasien', compact('dataPasien'));
    }

    public function attr_pasien(){
        // DB::table('')
        return view('admin.pasien.attr_pasien');
    }
    public function updatePasien($id_pasien){
        // $flight = pasien::find($id_pasien);
        // $flight->nama = ;
        // $flight->rekam_medis = 'rekamMedis';
        //     $flight->jenisKelamin = 'jenis_kelamin';
        //     $flight->NIK = 'NIK';
        //     $flight->agama = 'agama';
        //     $flight->tanggal_lahir = 'tgl_lahir';
        //     $flight->umur_daftar = 'umur';
        //     $flight->lebih_bulan = 'bulan';
        //     $flight->email = 'email';
        //     $flight->alamat = ;
        //     $flight->telpon = 'telp';
        //     $flight->asuransi = 'asuransi';
        //     $flight->pekerjaan = 'pekerjaan';
        //     // $flight->email_verified_at =
        //     $flight->passwod = ,
        //     // $flight-> remember_token =
        //     $flight->created_t = 'Ym-d H-i-s'),
        //     // $flight-> updated_at =
        //     // $flight-> deleted_at =
        //     $flight->save();
    }
    public function daftarPasien(Request $request){
        $alamat_detail = 'kelurahan ' . $request->kelurahan . ', kecamatan ' . $request->kecamatan . ', kabupaten ' . $request->kabupaten.', kota ' . $request->kota ;
        $password = rand();

        $id =  $request->rekamMedis;
        $namafoto = '';
        if ($request->hasFile('foto')) {
            $datafoto = $request->file('foto');
            $namafoto = $datafoto->getClientOriginalName() . '.' . $datafoto->getClientOriginalExtension();
            // $namafoto = $datafoto->getClientOriginalName();
            $request->file('foto')->storeAs('fotoPasien/' . $request->nama . '-' . $id, $namafoto);
        }

        // get last inserted id from db builder
        $idpasien = DB::table('pasien')->insertGetId([
            'rekam_medis' => $request->rekamMedis,
            'nama' => $request->nama_baru,
            'jenisKelamin' => $request->jenis_kelamin,
            'NIK' => $request->NIK,
            'warga_negara' => $request->warganegara,
            'agama' => $request->agama,
            'tanggal_lahir' => $request->tgl_lahir,

            'umur_daftar' => str_replace(' tahun','',$request->umur),
            'lebih_bulan' => str_replace('bulan', '', $request->bulan),

            'email' => $request->email,
            'alamat' => $request->alamat.' alamat detail : '.$alamat_detail ,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->kota,
            'telpon' => $request->telp,
            // 'asuransi' => $request->asuransi,
            // asuransi di pindah ke table tambahan
            'pekerjaan' => $request->pekerjaan,
            // 'email_verified_at' =>
            'password' => $password,
            // 'remember_token' =>
            'created_at' => Carbon::now(),
            // 'updated_at' =>
            // 'deleted_at' =>
        ]);

        DB::table('informasipasien')->insert([
            "id_pasien" => $idpasien,
            "bahasa" => $request->bahasa,
            "ciri_fisik" => $request->cirifisik,
            "cacat_fisik" => $request->cacatfisik,
        ]);

        if (isset($request->hubungan_kel)) {
            DB::table('informasipasien')->where('id_pasien',$idpasien)->update([
                "hubungan_keluarga" => $request->hubungan_kel,
                "nama_keluarga" => $request->nama_kel,
                "pekerjaan_keluarga" => $request->pekerjaan_kel,
                "telpon" => $request->telp_kel,
                "email" => $request->email_kel,
                "jenis_kelamin" => $request->jenis_kel,
                "kelurahan" => $request->kelurahan_kel,
                "kecamatan" => $request->kecamatan_kel,
                "kabupaten" => $request->kabupaten_kel,
                "provinsi" => $request->kota_kel,
                "alamat" => $request->alamat_kel,
                "updated_at" => Carbon::now(),
            ]);
        }

        return response()->json([
            "status"=>"success","message"=> ["nama"=> $idpasien,"rekam"=> $request->rekamMedis]
        ]);
    }

    public function masterpasien(){
        $pasien = pasien::all();
        $jumlahAsuransi = pasien::where('asuransi', 'BPJS')->count();
        $jumlahTanpaAsuransi = pasien::where('asuransi', '!=', 'BPJS')->orWhereNull('asuransi')->count();
        $jumlahRawatInap = pasien::where('status_pasien', 'rawat inap')->count();
        $jumlahPasien = pasien::all()->count();;
        return view('admin.pasien.masterpasien', compact('pasien','jumlahAsuransi','jumlahPasien','jumlahTanpaAsuransi', 'jumlahRawatInap'));
    }
    public function hapus_pasien(){
        //todo
    }
    public function dataSpesialis()
    {
        $dataSpesialis = DB::table('spesialis')->select()->get();
        return $dataSpesialis;
        // return response()->json(dd($dataSpesialis));
    }
    public function datatindakandokter()
    {
        $datatindakandokter = DB::table('tindakan_kedokteran')->join('spesialis', 'tindakan_kedokteran.id_spesialis', '=', 'spesialis.id_spesialis')->select('tindakan_kedokteran.*', 'spesialis.spesialis as nama_spesialis')->get();
        return $datatindakandokter;
        // return response()->json(dd($datatindakandokter));
    }

    public function dataSpesialis_json()
    {
        $dataSpesialis = DB::table('spesialis')->select()->get();
        return response()->json($dataSpesialis);
    }
    public function kategoriobat()
    {
        $kategoriobat = DB::table('kategoriobat')->select()->get();
        return response()->json($kategoriobat);
    }

    public function satuanobat()
    {
        $satuan = DB::table('satuan_obat')->select()->get();
        return response()->json($satuan);
    }

    public function dataKamar_json()
    {
        $dataKamar = DB::table('kamar')->select()->get();
        return response()->json($dataKamar);
    }

    public function dataObat_json()
    {
        $dataObat = DB::table('obat')->select()->get();
        // return response()->json($dataObat);
        return $dataObat;
    }
    public function dataJabatan_json()
    {
        $dataJabatan = DB::table('jabatan')->select()->get();
        return response()->json($dataJabatan);
    }
    public function dataJabatan()
    {
        $dataJabatan = DB::table('jabatan')->select()->get();
        return $dataJabatan;
    }

    public function masterdokter(){
        $spesialis = $this->dataSpesialis();
        $recent_dokter = $this->recent_dokter();
        $recent_updatedokter = $this->recentupdate_dokter();
        $datadokter = dokterModel::all();
        $datadokterdeleted = dokterModel::onlyTrashed()->get();
        return view('admin.dokter.masterdokter', compact('datadokterdeleted','spesialis','datadokter', 'recent_dokter', 'recent_updatedokter'));
    }

    public function tambahdokter(){
        $dataSpesialis = $this->dataSpesialis();
        $dataJabatan = $this->dataJabatan();
        return view('admin.dokter.tambahdokter', compact('dataSpesialis','dataJabatan'));
    }

    public function simpanDokter(doktervalid $request){
            // first() to get just one row
            $id =  $request->NIK;
            $namafoto = '';
        if ($request->hasFile('foto')) {
            $datafoto = $request->file('foto');
            $namafoto = $datafoto->getClientOriginalName() . '.' . $datafoto->getClientOriginalExtension();
            // $namafoto = $datafoto->getClientOriginalName();
            $request->file('foto')->storeAs('fotoDokter/'. $request->nama.'-'. $id, $namafoto);
        }

        $faker = Faker::create('id_ID');


        DB::table('dokter')->insert([
            "nama_dokter" => $request->nama,
            "NIK" => $request->NIK,
            "agama" => $request->agama,
            "jabatan" => $request->jabatan,
            "nomor_str" => $request->nama,
            "email" => $request->email,
            "telpon" => $request->telpon,
            "password" => $faker->password,
            "jenis_kelamin" => $request->jenis_kelamin,
            "universitas" => $request->universitas,
            "tanggal_lahir" => $request->tanggal_lahir,
            "spesialis" => $request->spesialis,
            "alamat" => $request->alamat,
            "foto" => $namafoto,
            "created_at" => Carbon::now(),
        ]);

        return response()->json([
            "status"=>"success","message"=> "data berhasil diinputkan"]);
    }

    public function recent_dokter(){
         //    $datadoker =  DB::table('dokter')->latest('id_dokter', 'asc')->take(5)->get(); //ini memakai db builder
       $datadoker = dokterModel::orderBy('id_dokter', 'desc')->take(5)->whereNull('deleted_at')->get();
       return response()->json($datadoker);
    }
    public function hapus_dokter($id){
       dokterModel::where('id_dokter', $id)->delete();
        //    $datadoker =  DB::table('dokter')->where('id_dokter', $id);
        //     $datadoker->update(['deleted_at' => Carbon::now()]);
        return response()->json([
            "status" => "success", "message" => "data berhasil dihapus"
        ]);
    }
    public function tampil_dokter($id){
        $data = DB::table('dokter')->where('id_dokter',$id)->first();
        return response()->json($data);
    }
    public function updateDokter(doktervalidupdate $request, $id){
        $cari = dokterModel::find($id);
        $namafoto_lama = $cari->foto;
        $nama_dokter = $cari->nama_dokter;
        $nama_folder = $nama_dokter.'-'.$cari->NIK;

        $namafoto = '';
        if ($request->hasFile('foto')) {
            $datafoto = $request->file('foto');
            $namafoto = $datafoto->getClientOriginalName();
            // script upload foto cukup begini , foto yang dikirim wajib di upload walau nama sama siapa tahu gambar berbeda
            $isExists = Storage::exists('fotoDokter/'.$nama_folder.'/'.$namafoto_lama);
            if ($isExists) {
                Storage::delete('fotoDokter/'.$nama_folder.'/'.$namafoto_lama);
            }
            Storage::put('fotoDokter_cadangan/'.$nama_folder, $request->file('foto'));
            $request->file('foto')->storeAs('fotoDokter/' . $nama_folder    , $namafoto);

            DB::table('dokter')->where('id_dokter', $id)->update([
                "foto" => $namafoto
            ]);
        }

        DB::table('dokter')->where('id_dokter', $id)->update([
            "nama_dokter" => $request->nama,
            "NIK" => $request->NIK,
            "agama" => $request->agama,
            "jabatan" => $request->jabatan,
            "nomor_str" => $request->nomor_str,
            "email" => $request->email,
            "jenis_kelamin" => $request->jenis_kelamin,
            "universitas" => $request->universitas,
            "tanggal_lahir" => $request->tanggal_lahir,
            "spesialis" => $request->spesialis,
            "alamat" => $request->alamat,
            "updated_at" => Carbon::now(),
        ]);

        return response()->json([
            "status" => "success", "message" => "data berhasil diupdate"
        ]);
    }
    public function recentupdate_dokter(){
        $datadoker = dokterModel::orderBy('updated_at', 'desc')->where('updated_at','!=','NULL')->take(5)->whereNull('deleted_at')->get();
        return response()->json($datadoker);
    }

    public function jadwaldokter(){
        $datadokter = dokterModel::select('id_dokter','nama_dokter','spesialis')->get();
        $dataSpesialis = $this->dataSpesialis();
        $datajam = DB::table('jadwaljam')->select()->get();
        return view('admin.jadwal.jadwaldokter', compact('dataSpesialis','datajam','datadokter'));
    }

    public function caridokter(Request $request){
        $pencarian = $request->get('pencarian');
        $berdasarkan = $request->get('berdasarkan');
        $poli = $request->get('poli');
        // $pencarian = json_decode($jsonPencarian);//ini untuk data array yo
        $hasil = '';
        if ($berdasarkan == 'Nama') {
            $hasil = DB::table('dokter')->where('spesialis',$poli)->where('nama_dokter', 'like', '%'.$pencarian.'%')->whereNull('deleted_at')->get();
        }else if ($berdasarkan == 'Id_dokter') {
            $hasil =  DB::table('dokter')->where('spesialis',$poli)->where('id_dokter', 'like', '%'.$pencarian.'%')->whereNull('deleted_at')->get();
        }
        // $hasil =  DB::table('dokter')->select()->get();
        return response()->json([
            "status" => "success", "message" => $hasil
        ]);
    }

    public function spesialis(){
        // $dataSpesialis = $this->dataSpesialis();
        // $dataJabatan = $this->dataJabatan();
        // return view('admin.attribute.spesialis', compact('dataSpesialis','dataJabatan'));
        return view('admin.attribute.spesialis');
    }

    // public function spesialis(){
    //     $dataSpesialis = $this->dataSpesialis();
    //     $dataJabatan = $this->dataJabatan();
    //     return view('admin.attribute.spesialis', compact('dataSpesialis','dataJabatan'));
    // }
    public function simpan_spesialis(Request $request){
        $nama_spesialis = $request->spesialis;
        DB::table('spesialis')->insert([
            'spesialis' => $nama_spesialis,
            'created_at' => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data berhasil ditambahkan"]);
    }
    public function ambil_spesialis($id){
        $spesialis = DB::table('spesialis')->where('id_spesialis',$id)->get();
        return response()->json($spesialis);
    }
    public function ambil_jadwaldokter(){
        // $jadwaldokter = DB::table('jadwaldokter')->select()->get();
        $jadwaldokter = DB::table('jadwaldokter AS j')->join('dokter AS d', 'd.id_dokter', '=','j.id_dokter')
        ->join('spesialis AS s', 's.id_spesialis','=','d.spesialis')
        ->join('jadwaljam AS jj','jj.id','=','j.id_jam')
        ->select('j.*', 'd.nama_dokter', 'd.spesialis' ,'s.spesialis AS nama_spesialis','jj.jam_mulai', 'jj.jam_selesai')->get();

        return response()->json($jadwaldokter);
    }
    public function ambil_jadwal($id){
        $jadwaldokter = DB::table('jadwaldokter AS jd')
        ->join('jadwaljam AS jj','jj.id','=','jd.id_jam')
        ->where('jd.id_dokter',$id)->get();
        return response()->json($jadwaldokter);
    }
    public function hapus_spesialis($id){
        DB::table('spesialis')->where('id_spesialis',$id)->delete();
        return response()->json(["status" => "success", "message" => "data berhasil dihapus"]);
    }
    public function edit_spesialis(Request $request, $id){
        DB::table('spesialis')->where('id_spesialis', $id)->update([
            'spesialis' => $request->spesialis,
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data berhasil ditambahkan"]);
    }

    // /////////////////////
    public function simpan_jabatan(Request $request)
    {
        $nama_jabatan = $request->jabatan;
        DB::table('jabatan')->insert([
            'jabatan' => $nama_jabatan,
            'created_at' => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data berhasil ditambahkan"]);
    }
    public function ambil_jabatan($id)
    {
        $jabatan = DB::table('jabatan')->where('id_jabatan', $id)->get();
        return response()->json($jabatan);
    }
    public function hapus_jabatan($id)
    {
        DB::table('jabatan')->where('id_jabatan', $id)->delete();
        return response()->json(["status" => "success", "message" => "data berhasil dihapus"]);
    }
    public function edit_jabatan(Request $request, $id)
    {
        DB::table('jabatan')->where('id_jabatan', $id)->update([
            'jabatan' => $request->jabatan,
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data berhasil ditambahkan"]);
    }

    public function kamar()
    {
        $spesialis = $this->dataSpesialis();
        $recent_dokter = $this->recent_dokter();
        $recent_updatedokter = $this->recentupdate_dokter();
        $datadokter = dokterModel::all();
        $datadokterdeleted = dokterModel::onlyTrashed()->get();
        return view('admin.kamar.masterkamar', compact('datadokterdeleted', 'spesialis', 'datadokter', 'recent_dokter', 'recent_updatedokter'));
    }
    public function dataBangsal(){
        $dataBangsal = DB::table('bangsal')->select()->get();
        return $dataBangsal;
    }
    public function dataKelas(){
        $dataKelas = DB::table('kelas')->select()->get();
        return $dataKelas;
    }
    public function tambah_kamar()
    {
        $dataKamar = DB::table('kamar')->orderBy('id_kamar', 'desc')->first();
        // $dataKamar = DB::table('kamar')->select()->get();
        $dataKelas = $this->dataKelas();
        $dataBangsal = $this->dataBangsal();
        return view('admin.kamar.tambahkamar', compact('dataKelas', 'dataKamar','dataBangsal'));
    }
    public function simpan_kamar(Request $request){

        $this->validate($request, [
            'nama_kamar'  => 'required|unique:kamar,nama_kamar',
            'kelas' => 'required',
            'bangsal' => 'required',
        ]);

        DB::table('kamar')->insert([
            'nama_kamar' => "RM-".$request->nama_kamar,
            'kelas' => $request->kelas,
            'bangsal' => $request->bangsal,
        ]);
        return response()->json(["status" => "success", "message" => "kamar berhasil ditambahkan"]);
    }
    public function ambil_kamar($id)
    {
        // $spesialis = DB::table('kamar')->where('id_kamar', $id)->get(); menggunakan get hanya untuk data yang banyak
        $spesialis = DB::table('kamar')->where('id_kamar', $id)->first();
        return response()->json($spesialis);
    }
    public function edit_kamar(Request $request, $id)
    {
        DB::table('kamar')->where('id_kamar', $id)->update([
            'nama_kamar' => $request->nama_kamar,
            'bangsal' => $request->bangsal,
            'kelas' => $request->kelas,
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data berhasil ditambahkan"]);
    }
    public function hapus_kamar($id)
    {
        DB::table('kamar')->where('id_kamar', $id)->delete();
        return response()->json(["status" => "success", "message" => "data berhasil dihapus"]);
    }
    public function prever_namakamar(){
        $dataKamar = DB::table('kamar')->orderBy('id_kamar', 'desc')->first();
        $akhir = $dataKamar->nama_kamar;
        $nmrKmr = substr($akhir, 3);
        $nmrKmr = intval($nmrKmr) + 1;
        return response()->json($nmrKmr);
    }
    public function ambil_bangsal($id){
        $dataBangsal = DB::table('bangsal')->where('id_bangsal',$id)->first();
        return response()->json($dataBangsal);
    }

    public function edit_bangsal(Request $request , $id){
        DB::table('bangsal')->where('id_bangsal', $id)->update([
            "bangsal" => $request->bangsal,
        ]);
        return response()->json(["status" => "success", "message" => "data berhasil ditambahkan"]);
    }

    public function hapus_bangsal($id)
    {
        DB::table('bangsal')->where('id_bangsal', $id)->delete();
        return response()->json(["status" => "success", "message" => "data berhasil dihapus"]);
    }

    public function simpan_bangsal(Request $request)
    {
        DB::table('bangsal')->insert([
            "bangsal" =>    $request->bangsal,
        ]);
        return response()->json(["status" => "success", "message" => "data berhasil ditambahkan"]);
    }

    public function ambil_kelas($id){
        $datakelas = DB::table('kelas')->where('id_kelas',$id)->first();
        return response()->json($datakelas);
    }

    public function edit_kelas(Request $request , $id){
        DB::table('kelas')->where('id_kelas', $id)->update([
            "kelas" =>    $request->kelas,
            "fasilitas" =>    $request->fasilitas,
            "harga" =>    $request->harga,
            "updated_at" => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data berhasil ditambahkan"]);
    }

    public function hapus_kelas($id)
    {
        DB::table('kelas')->where('id_kelas', $id)->delete();
        return response()->json(["status" => "success", "message" => "data berhasil dihapus"]);
    }

    public function simpan_kelas(Request $request)
    {
        DB::table('kelas')->insert([
            "kelas" =>    $request->kelas,
            "fasilitas" =>    $request->fasilitas,
            "harga" =>    $request->harga,
            "created_at" =>    Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data berhasil ditambahkan"]);
    }

    public function obat()
    {
        $dataObat = DB::table('obat')->select()->get();
        $dataKategori = DB::table('kategoriobat')->select()->get();
        $dataSatuan = DB::table('satuan_obat')->select()->get();
        return view('admin.obat.masterobat', compact('dataObat', 'dataKategori','dataSatuan'));
    }
    public function tambah_obat()
    {
        $dataKategori = DB::table('kategoriobat')->select()->get();
        $dataSatuan = DB::table('satuan_obat')->select()->get();
        $dataObat = DB::table('obat')->select()->get();
        return view('admin.obat.tambahobat', compact('dataObat', 'dataKategori','dataSatuan'));
    }
    public function ambil_obat($id)
    {
        $dataobat = DB::table('obat')->where('id_obat', $id)->first();
        return response()->json($dataobat);
    }
    public function edit_obat(Request $request , $id)
    {
        DB::table('obat')->where('id_obat', $id)->insert([
            'nama_obat' => $request->nama_obat,
            'kategori_obat' => $request->kategori,
            'kadaluarsa' => $request->kadaluarsa,
            'satuan' => $request->satuan,
            'harga_obat' => $request->harga_obat,
            'deskripsi_obat' => $request->deskripsi_obat,
            'stock' => $request->stock,
            "updated_at" => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data obat berhasil diupdate"]);
    }
    public function simpan_obat(Request $request)
    {
        DB::table('obat')->insert([
            'nama_obat' => $request->nama_obat,
            'kategori_obat' => $request->kategori,
            'kadaluarsa' => $request->kadaluarsa,
            'satuan' => $request->satuan,
            'harga_obat' => $request->harga_obat,
            'deskripsi_obat' => $request->deskripsi_obat,
            'stock' => $request->stock,
            "created_at" => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data obat berhasil ditambahkan"]);
    }
    public function hapus_obat($id)
    {
        DB::table('obat')->where('id_obat', $id)->delete();
        return response()->json(["status" => "success", "message" => "data berhasil dihapus"]);
    }


    public function ambil_kategori($id)
    {
        $datakategori = DB::table('kategoriobat')->where('id_katObat', $id)->first();
        return response()->json($datakategori);
    }
    public function edit_kategori(Request $request, $id)
    {
        DB::table('kategoriobat')->where('id_katObat', $id)->insert([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->deskripsi_kategori,
            "updated_at" => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data kategori berhasil diupdate"]);
    }
    public function simpan_kategori(Request $request)
    {
        DB::table('kategoriobat')->insert([
            'nama_kategori' => $request->kategori,
            'keterangan' => $request->deskripsi_kategori,
            "created_at" => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data kategori berhasil ditambahkan"]);
    }

    public function hapus_kategori($id)
    {
        DB::table('kategoriobat')->where('id_katObat', $id)->delete();
        return response()->json(["status" => "success", "message" => "data berhasil dihapus"]);
    }

    public function ambil_satuan($id)
    {
        $datasatuan = DB::table('satuan_obat')->where('id_katObat', $id)->first();
        return response()->json($datasatuan);
    }
    public function edit_satuan(Request $request, $id)
    {
        DB::table('satuan_obat')->where('id_katObat', $id)->update([
            'nama_satuan' => $request->nama_satuan,
            'keterangan' => $request->deskripsi_satuan,
            "updated_at" => Carbon::now(),
            ]);
        return response()->json(["status" => "success", "message" => "data satuan berhasil diupdate"]);
    }
    public function simpan_satuan(Request $request)
    {
        DB::table('satuan_obat')->insert([
            'nama_satuan' => $request->satuan,
            'keterangan' => $request->deskripsi_satuan,
            "created_at" => Carbon::now(),
            ]);
        return response()->json(["status" => "success", "message" => "data satuan berhasil ditambahkan"]);
    }

    public function hapus_satuan($id)
    {
        DB::table('satuan_obat')->where('id_katObat', $id)->delete();
        return response()->json(["status" => "success", "message" => "data berhasil dihapus"]);
    }
    public function tambah_tindakan()
    {
        $dataSpesialis = $this->dataSpesialis();
        $dataKategori = DB::table('kategoriobat')->select()->get();
        $dataSatuan = DB::table('satuan_obat')->select()->get();
        $dataObat = DB::table('obat')->select()->get();
        return view('admin.obat.tambahtindakan', compact('dataSpesialis','dataObat', 'dataKategori', 'dataSatuan'));
    }
    public function ambil_tindakan($id)
    {
        $ambilTindakan = DB::table('tindakan_kedokteran')->where('id_tinDokter', $id)->first();
        // return $ambilTindakan;
        return response()->json($ambilTindakan);
    }
    public function filtertindakan($id_spesialis)
    {
        $ambilTindakan = DB::table('tindakan_kedokteran')->where('id_spesialis', $id_spesialis)->get();
        // return $ambilTindakan;
        return response()->json($ambilTindakan);
    }
    public function simpan_tindakan(Request $request)
    {
        DB::table('tindakan_kedokteran')->insert([
            'id_spesialis' => $request->spesialis,
            'nama_tindakan' => $request->nama_tindakan,
            'harga_tindakan' => $request->harga_tindakan,
            'keterangan_tindakan' => $request->deskripsi_tindakan,
            "created_at" => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data kategori berhasil ditambahkan"]);
    }
    public function edit_tindakan(Request $request, $id)
    {
        DB::table('tindakan_kedokteran')->where('id_tinDokter', $id)->update([
            'id_spesialis' => $request->spesialis,
            'nama_tindakan' => $request->nama_tindakan,
            'harga_tindakan' => $request->harga_tindakan,
            'keterangan_tindakan' => $request->deskripsi_tindakan,
            "updated_at" => Carbon::now(),
        ]);
        return response()->json(["status" => "success", "message" => "data satuan berhasil diupdate"]);
    }
    public function buatjadwal(Request $request, $id)
    {
        $datahari = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
        foreach ($datahari as $key => $value) {
            if ($request->$value) {
                DB::table('jadwaldokter')->insert([
                'id_dokter' => $id,
                'id_jam' => $request->jam,
                'hari' => $value,
                'keterangan' => $request->harga_tindakan,
                "created_at" => Carbon::now(),
        ]);
            }
        }

        return response()->json(["status" => "success", "message" => "berhasil tambah jadwal dokter"]);
    }
    public function jadwalsekarang()
    {
        $jam = Carbon::now()->format('H:i:s');
        $hari = Carbon::now()->translatedFormat('l');
        return response()->json(["status" => "success", "jam" => $jam, "hari" => $hari]);
    }
    public function listdoktersekarang(Request $request)
    {
        $hari = $request->hari;
        $poli = $request->poli;

        $hasiljJam = 0 ;
        $jam = $request->jam;
        $jam = strtotime($jam);
        $jam = date('H:i:s', $jam);

        $lastTime = DB::table('jadwaljam')->where('jam_selesai', DB::raw("(select max(`jam_selesai`) from jadwaljam)"))->select('jam_selesai')->first();
        $lastTime = strtotime($lastTime->jam_selesai);
        $lastTime = date('H:i:s', $lastTime);

        if ($jam >= $lastTime) {
            $hasiljJam = count(DB::table('jadwaljam')->select()->get());
        }else{
            $hasiljJam = DB::table('jadwaljam')
            ->where('jam_mulai', '<=', $jam)
            ->where('jam_selesai', '>=', $jam)
            ->select('id')
            ->first();
            $hasiljJam = $hasiljJam->id;
        }

        $dapat = DB::table('jadwaldokter as j')
        ->join('dokter as d', 'd.id_dokter', '=', 'j.id_dokter')
        ->join('jadwaljam as jj', 'j.id_jam', '=', 'jj.id')
        ->where('jj.id', $hasiljJam)
        ->where('d.spesialis', $poli)
        ->where('j.hari', $hari)
        ->select()
        ->get();
        return response()->json($dapat);
    }
}
