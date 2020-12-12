<?php

namespace App\Http\Controllers;

// use App\Modeltodolist;
// query builder
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class todolistController extends Controller
{
    public function getList(){
        // menggunakan db builder
        $result = DB::table('todolist')->orderBy('id','desc')->get();
        return response()->json($result);
    }

    public function postCreate(){
        // menggambil data form dengan nama content
        $content = request('content');
        DB::table('todolist')->insert([
            'created_at' => date('Y-m-d H-i-s'),
            'content' => $content
        ]);
        return response()->json(['status'=>true,'message'=>'data berhasil ditambahkan']);
    }

    public function postUpdate($id){
        $content = request('content');
        DB::table('todolist')->where('id',$id)->update([
            'created_at' => date('Y-m-d H-i-s'),
            'content' => $content
        ]);
        return response()->json(['status'=>true,'message'=>'data berhasil diupdate']);
    }

    public function getDelete($id){
        DB::table('todolist')->where('id',$id)->delete();
        return response()->json(['status'=>true,'message'=>'data berhasil dihapus']);
    }
}
