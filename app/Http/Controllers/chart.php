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

        $senin = $datadokter->where('hari','senin')->count();
        $selasa = $datadokter->where('hari','selasa')->count();
        $rabu = $datadokter->where('hari','rabu')->count();
        $kamis = $datadokter->where('hari','kamis')->count();
        $jumat = $datadokter->where('hari','jumat')->count();
        $sabtu = $datadokter->where('hari','sabtu')->count();
        $minggu = $datadokter->where('hari','minggu')->count();

        return ([$senin,$selasa,$rabu,$kamis,$jumat,$sabtu,$minggu]);

    }
}
