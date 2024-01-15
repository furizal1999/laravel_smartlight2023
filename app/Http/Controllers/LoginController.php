<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->login = new Login;
    }

    function index(Request $request){
        return view('welcome');
    }

    function login(Request $request){
        $row = $this->login->getUser($request->email);
        if($row){
            if($row->account_status=="Active"){
                if(password_verify($request->password, $row->password)){
                    Session::put('login_smartlight', true);
                    Session::put('user_id', $row->user_id);
                    Session::put('email', $row->email);
                    Session::put('name', $row->name);
                    Session::put('sex', $row->sex);
                    Session::put('created_at', $row->created_at);
                    return redirect(route("user.control.light"));
                    exit;
                }else{
                    return redirect(route("user.auth"))->with(['alertclass' => "danger"])->with(['message' => "Maaf, password tidak sesuai"]);
                }
            }else{
                return redirect(route("user.auth"))->with(['alertclass' => "danger"])->with(['message' => "Maaf, Akun anda sedang tidak aktif!"]);
            }
        }else{
            return redirect(route("user.auth"))->with(['alertclass' => "danger"])->with(['message' => "Maaf, username yang anda masukkan salah!"]);
        }
    }

    function logout(){
        Session::flush();
        return redirect(route('user.auth'));
    }
}
