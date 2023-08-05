<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = [];

        $data['siswa'] = null;

        if(auth()->user()->role_id == 2){
            $data['siswa'] = Siswa::with('status')->with('wali_murids')->where('user_id',auth()->user()->id)->first();
        }

        return view('home.index', $data);
    }
}
