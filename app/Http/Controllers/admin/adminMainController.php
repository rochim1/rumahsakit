<?php
// class controller yang dibuat untuk halaman admin
namespace App\Http\Controllers\admin;

use Session;
use App\Http\Controllers\Controller;
use App\user;
use App\admin;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;
use App\Http\Requests\ErrorFormRequest; 


class adminMainController extends Controller
{
    public function checkLogin(ErrorFormRequest $request){
        if ($request->remember) {
            $ingat = $request->remember ? true : false; //varialbel yang akan berisi true atau false
            $data = $request->only('email', 'password');

            // $value = $request->cookie(['name','password']);
            // return back()->with('message','remember berhasil')->cookie('credential',$value,60);
        }
    }
    public function Auth(ErrorFormRequest $request)
    {
        // fungsi untuk validasi data dari form dengan ketentuan yang terdaftar , otomatis jalan
        // $this->validate(
        //     $request,
        //     ['email' => 'required'],
        //     ['email.required' => '*email harus diisi']
        // );

        // $validatedData = $request->validate([
        //     'email' => ['required', 'max:80'],
        //     'password' => ['required'],
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
            {    //metode withInput adalah untuk mengembalikan data form ke halaman lain
                return back()->with('message','email atau password salah')->withInput($request->except('password'));
                // return "password : ". $request->password ." dosn't match with :". $admin->password;
            }
        }
        else {
                return back()->with('message','email atau password salah');
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
