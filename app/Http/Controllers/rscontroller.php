<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class rscontroller extends Controller
{
    public function regpasien(){
        return view('admin.pasien.tambahpasien');
    }
    
    public function masterpasien(){
        return view('admin.pasien.masterpasien');
    }
    
    public function masterdokter(){
        return view('admin.dokter.dokter');
    }
    
    public function tambahdokter(){
        return view('admin.dokter.tambahdokter');
    }
}
