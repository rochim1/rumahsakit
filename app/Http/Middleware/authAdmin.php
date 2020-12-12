<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class authAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('credential')) {
            return $next($request);
        }
        else{
            $alamat = \Request::path();
            // $alamat = url()->current();
            // todo cara Laravel redirect back to original destination after login
            return redirect('/admin/login')->with('message',"anda tidak dapat mengakses page admin, silahkan login dahulu")->with('alamat', $alamat);
        }
    }
}
