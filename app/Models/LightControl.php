<?php

//sudah
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LightControl extends Model
{
    use HasFactory;
    function insertRequest($id_user, $lamp_to, $lamp_status, $status_data){
        $data = DB::table('tb_light_status')
            ->insert([
                'id_user' => $id_user,
                'lamp_to' => $lamp_to,
                'lamp_status' => $lamp_status,
                'status_data' => $status_data,
            ]);
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
