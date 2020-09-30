<?php
// class controller yang dibuat untuk halaman admin
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\user;
use App\admin;
use Illuminate\Http\Request;

class adminMainController extends Controller
{
    public function login(){
        return view('admin.login.page-login');
    }
    public function frontend(){
        return view('admin.layout.frontend');
    }
    public function header(){
        return view('admin.content');
    }
    public function content(){
        return view('admin.content');
    }
    public function footer(){
        return view('admin.content');
    }
    
    public function index(){
        return view('admin.content');
    }
    
    public function produk(){
        return view('admin.produk.listproduk');
    }
    public function tambahproduk(){
        return view('admin.produk.tambahproduk');
    }
    public function trashproduk(){
        return view('admin.trashproduk');
    }


    public function konsumen(){
        $konsumen = user::all();
        $admin = admin::all();
        return view('admin.users.konsumen',compact('konsumen'));
    }
    public function users(){
        $konsumen = user::all();
        $admin = admin::all();
        return view('admin.users.users',compact('konsumen','admin'));
    }
    public function admin(){
        $admin = admin::all();
        return view('admin.users.admin',compact('admin'));
    }
}
