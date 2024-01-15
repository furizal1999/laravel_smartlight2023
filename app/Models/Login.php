<?php

//sudah
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
    use HasFactory;
    function getUser($email){
        $data = DB::table('tb_user')
            ->where("email", "=", $email)
            ->where("account_status", "=", "Active")
            ->first();
        return $data;
	}

    function selectRequest($lamp_to){
        $data = DB::table('tb_light_status')
            ->where("status_data", "=", "Available")
            ->where("lamp_to", "=", $lamp_to)
            ->orderby('id_light_status', 'desc')->first();
        if($data){
            return $data->lamp_status;
        }else{
            return 0;
        }
	}
}
