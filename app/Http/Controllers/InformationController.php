<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index(){
        $data = [];
        $data['siswa'] = null;

        if(auth()->user()->role_id == 2){
            $data['siswa'] = Siswa::with('status')->with('wali_murids')->where('user_id',auth()->user()->id)->first();
        }

        return view('information.index', $data);
    }

    //
    public function get(Request $request){
        $response = [];
        $response['status'] = true;
        $response['message'] = "success";
        $response['data'] = Siswa::with('status')->where('status_id', $request->status_id)->orderBy('created_at', 'asc')->get();
        $response['total'] = count($response['data']);

        return response()->json($response);
    }
}
