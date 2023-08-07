<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Status;
use App\Models\WaliMurid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
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

        $data['statuses'] = Status::all();

        return view('admin.student.index',$data);
    }

    public function get(Request $request){
        $response = [];
        $response['status'] = true;
        $response['message'] = "success";
        $response['data'] = null;

        if($request->status_id != null && $request->status_id != 0 && $request->status_id < 4){
            $response['data'] = Siswa::with('status')->with('wali_murids')->where('status_id', $request->status_id)->orderBy('created_at', 'asc')->get();
        }elseif($request->status_id != null && $request->status_id == 4){
            $response['data'] = Siswa::with('status')->with('wali_murids')->orderBy('created_at', 'asc')->get();
        }else{
            $response['data'] = Siswa::with('status')->with('wali_murids')->where('status_id', null)->orderBy('created_at', 'asc')->get();
        }
        $response['total'] = count($response['data']);

        return response()->json($response);
    }

    public function ubahStatus(Request $request){
        $response = [];
        $response['status'] = true;
        $response['message'] = "success";

        try{
            $siswa = Siswa::find($request->siswa_id);
            if($siswa == null){
                $response['status'] = false;
                $response['message'] = "Data siswa ditemukan";
            }else{
                $siswa->update(['status_id' => $request->status_id]);
            }
        }catch(\Exception $e){
            $response['status'] = false;
            $response['message'] = $e->getMessage();
        }

        return response()->json($response);
    }

    public function destroy(Request $request){
        $response = [];
        $response['status'] = true;
        $response['message'] = "success";

        try{
            $siswa = Siswa::find($request->siswa_id);
            if($siswa != null){
                WaliMurid::where('siswa_id', $siswa->siswa_id)->delete();
            }

            // TODO deleting siswa's files
            Storage::disk('public')->delete('photo/'.$siswa->photo);
            Storage::disk('public')->delete('ijazah/'.$siswa->ijazah);
            Storage::disk('public')->delete('kk/'.$siswa->kk);

            $siswa->delete();

        }catch(\Exception $e){
            $response['status'] = false;
            $response['message'] = "";
        }

        return response()->json($response);
    }
}
