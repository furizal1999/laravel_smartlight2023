<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LightControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;


class PostController extends Controller
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

        // $data = array($lamp1, $lamp2, $lamp3, $lamp4, $lamp5, $lamp6, $lamp7, $lamp8, $lamp9, $lamp10);
         $dataToSend = array(
            "lamp_status1" => $lamp1,
            "lamp_status2" => $lamp2,
            "lamp_status3" => $lamp3,
            "lamp_status4" => $lamp4,
            "lamp_status5" => $lamp5,
            "lamp_status6" => $lamp6,
            "lamp_status7" => $lamp7,
            "lamp_status8" => $lamp8,
            "lamp_status9" => $lamp9,
            "lamp_status10" => $lamp10,
        );

        header('Content-Type: application/json');
        // echo json_encode($dataToSend);

        return response()->json($dataToSend);

       
        // return view('lightcontrol', $data);
    }
}
