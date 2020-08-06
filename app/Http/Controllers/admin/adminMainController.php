<?php
// class controller yang dibuat untuk halaman admin
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminMainController extends Controller
{
    public function index(){
        return view('admin.content');
    }
}
