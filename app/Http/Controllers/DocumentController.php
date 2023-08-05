<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $data = [];

        $data['siswa'] = Siswa::with('status')->where('user_id', auth()->user()->id)->first();

        return view('student.document.index', $data);
    }
}
