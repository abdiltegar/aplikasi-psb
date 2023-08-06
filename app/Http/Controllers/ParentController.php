<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\WaliMurid;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        // checking role
        if(!(auth()->user()->role_id == 2)){
            abort(403, 'Mohon maaf . Anda tidak memiliki hak akses untuk mengakses halaman ini.');
        }

        // TODO preparing data
        $data = [];

        $data['siswa'] = Siswa::with('status')->where('user_id', auth()->user()->id)->first();
        $data['ayah'] = WaliMurid::where([['siswa_id', $data['siswa']->siswa_id], ['jenis_wali_id',1]])->first();
        $data['ibu'] = WaliMurid::where([['siswa_id', $data['siswa']->siswa_id], ['jenis_wali_id',2]])->first();

        return view('student.parent.index', $data);
    }

    public function patch(Request $request){
        // checking role
        if(!(auth()->user()->role_id == 2)){
            abort(403, 'Mohon maaf . Anda tidak memiliki hak akses untuk mengakses halaman ini.');
        }

        return redirect()->route('data-orang-tua.index');
    }
}
