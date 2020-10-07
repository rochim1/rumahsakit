<?php
// class controller yang dibuat untuk halaman admin
namespace App\Http\Controllers\admin;

use Session;
use App\Http\Controllers\Controller;
use App\user;
use App\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class adminMainController extends Controller
{
    public function Auth(Request $request)
    {   
        // fungsi untuk validasi data dari form dengan ketentuan yang terdaftar=
        // $validatedData = $request->validate([
        // 'email' => ['required', 'unique:admin', 'max:80'],
        // 'password' => ['required'],
        // ]);



        // dd($request->all()); //ini adalah fungsi untuk menampilkan request seperti print_r
        $admin = admin::where('email', '=', $request->email )->firstOrFail();
        if ($admin) {
            // fungsi hash make adalah untuk membuat encode/hash
            $hashed = Hash::make($admin->password);
            // fungsi hash adalah mengecek hasil satu dengan satunya , contoh : requsest adalah hasil dari input sedangan admin->password adalah dari database
            if (Hash::check($request->password,$hashed)) {
                
                $serialize = $admin->toArray();
                Session::push('credential', $serialize);
                
                Session::put('name',$admin->nama);
                Session::put('email',$admin->email);
                Session::put('login',TRUE);

                return redirect("/admin");
            }
            else 
            {    
                return back()->with('message','email atau password salah');
                // return "password : ". $request->password ." dosn't match with :". $admin->password;
            }
        }
        else {
            return 'wrong credentials';
        }
        
    }

    public function logout(){
        session()->flush();
        return redirect('/admin/login');
    }
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
