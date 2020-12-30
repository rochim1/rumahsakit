<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class kota extends Controller
{
    public function getKota(){
        $url1 = 'http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
        $url = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi';
        $data = file_get_contents($url);
        // bisa pakai variabel data ataupun response sama saja
        $response = Http::get($url)->body();
        return response()->json($response);
        // return $response;
    }
    public function getKabupaten($id_kota){
        $get = 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='.$id_kota;
        $response = Http::get($get)->body();
        return response()->json($response);
    }
    public function getKecamatan($id_kabupaten){
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota='.$id_kabupaten)->body();
        return response()->json($response);
    }
    public function getKelurahan($id_kecamatan){
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan='.$id_kecamatan)->body();
        return response()->json($response);
    }

}
