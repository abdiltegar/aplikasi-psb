<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\WaliMurid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        // checking role
        if(!(auth()->user()->role_id == 1)){
            abort(403, 'Mohon maaf . Anda tidak memiliki hak akses untuk mengakses halaman ini.');
        }

        return view('admin.account.index');
    }

    public function get(Request $request){
        $response = [];
        $response['status'] = true;
        $response['message'] = "success";
        $response['data'] = User::orderBy('created_at', 'asc')->get();
        $response['total'] = count($response['data']);

        return response()->json($response);
    }

    public function update(Request $request){
        $response = [];
        $response['status'] = true;
        $response['message'] = "success";

        try{
            if(isset($request->password)){
                User::find($request->id)->update([
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

            }else{
                User::find($request->id)->update([
                    'email' => $request->email,
                ]);
            }
        }catch(\Exception $e){
            $response['status'] = false;
            $response['message'] = "";
        }

        return response()->json($response);
    }

    public function destroy(Request $request){
        $response = [];
        $response['status'] = true;
        $response['message'] = "success";

        try{
            $siswa = Siswa::where('user_id', $request->id)->first();
            if($siswa != null){
                WaliMurid::where('siswa_id', $siswa->siswa_id)->delete();
            }

            // TODO deleting siswa's files
            Storage::disk('public')->delete('photo/'.$siswa->photo);
            Storage::disk('public')->delete('ijazah/'.$siswa->ijazah);
            Storage::disk('public')->delete('kk/'.$siswa->kk);

            $siswa->delete();

            User::find($request->id)->delete();

        }catch(\Exception $e){
            $response['status'] = false;
            $response['message'] = "";
        }

        return response()->json($response);
    }
}
