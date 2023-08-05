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
        $data = [];

        $data['siswa'] = Siswa::with('status')->where('user_id', auth()->user()->id)->first();
        $data['parents'] = WaliMurid::where('siswa_id', $data['siswa']->siswa_id)->orderBy('jenis_wali_id', 'asc')->get();

        return view('student.parent.index', $data);
    }
}
