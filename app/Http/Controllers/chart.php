<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Faker\Factory as Faker;
use \App\pasien;
use Illuminate\Support\Facades\Storage;
use \App\dokterModel;

use Illuminate\Http\Request;

class chart extends Controller
{
    public function chart_hari()
    {
        $datadokter = DB::table('jadwaldokter')->select()->get();

        $senin = $datadokter->where('hari','Senin')->count();
        $selasa = $datadokter->where('hari','Selasa')->count();
        $rabu = $datadokter->where('hari','Rabu')->count();
        $kamis = $datadokter->where('hari','Kamis')->count();
        $jumat = $datadokter->where('hari','Jumat')->count();
        $sabtu = $datadokter->where('hari','Sabtu')->count();
        $minggu = $datadokter->where('hari','Minggu')->count();

        return ([$senin,$selasa,$rabu,$kamis,$jumat,$sabtu,$minggu]);

    }
}
