<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

use Closure;
use Session;

class CheckUserAccess
{
    public function handle($request, Closure $next)
    {
        // dd(Session::get('login_smartlight'));
        if(((null == Session::get('login_smartlight')) && (null == Session::get('email')))){
            return redirect(route("user.auth"));
		}
        // else{
            // return redirect(route("user.control.light"));
            // if(((null == Session::get('status_login')) || ("" == Session::get('status_login'))) ||  (((null == Session::get('id')) || ("" == Session::get('id'))))){
            //     return redirect(route("home"));
            // }
		// }
        // Lanjutkan ke proses berikutnya
        return $next($request);
    }
}