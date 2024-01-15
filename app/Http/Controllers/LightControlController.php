<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LightControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;


class LightControlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->lightcontrol = new LightControl;
    }

    public function index(Request $request)
    {
        $lamp1 = $this->lightcontrol->selectRequest(1);
        $lamp2 = $this->lightcontrol->selectRequest(2);
        $lamp3 = $this->lightcontrol->selectRequest(3);
        $lamp4 = $this->lightcontrol->selectRequest(4);
        $lamp5 = $this->lightcontrol->selectRequest(5);
        $lamp6 = $this->lightcontrol->selectRequest(6);
        $lamp7 = $this->lightcontrol->selectRequest(7);
        $lamp8 = $this->lightcontrol->selectRequest(8);
        $lamp9 = $this->lightcontrol->selectRequest(9);
        $lamp10 = $this->lightcontrol->selectRequest(10);

        $data['data'] = array($lamp1, $lamp2, $lamp3, $lamp4, $lamp5, $lamp6, $lamp7, $lamp8, $lamp9, $lamp10);

        return view('lightcontrol', $data);
    }

    public function insertRequest($id_user, $lamp_to, $lamp_status, $status_data){
        $result = $this->lightcontrol->insertRequest($id_user, $lamp_to, $lamp_status, $status_data);
        return response()->json(['result' => $result]);
    }
}
