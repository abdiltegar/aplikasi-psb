<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
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
        
        $data = [];

        $data['siswa'] = Siswa::with('status')->where('user_id', auth()->user()->id)->first();

        return view('student.document.index', $data);
    }

    public function update(Request $request){
        $response = [];
        $response['status'] = true;
        $response['message'] = "success";

        $siswa = Siswa::where('user_id', auth()->user()->id)->first();

        try{
            if(request()->hasFile('ijazah')){
                if($siswa->ijazah != null){
                    Storage::disk('public')->delete('ijazah/'.$siswa->ijazah);
                }

                $filePhoto = request()->file('ijazah');

                $ijazah = $filePhoto->getClientOriginalName();
                $filePhoto->storeAs('public/ijazah', $ijazah);

                $siswa->update([
                    'ijazah' => $ijazah
                ]);
            }

            if(request()->hasFile('kk')){
                if($siswa->kk != null){
                    Storage::disk('public')->delete('kk/'.$siswa->kk);
                }

                $filePhoto = request()->file('kk');

                $kk = $filePhoto->getClientOriginalName();
                $filePhoto->storeAs('public/kk', $kk);

                $siswa->update([
                    'kk' => $kk
                ]);
            }
        }catch(\Exception $e){
            $response['status'] = false;
            $response['message'] = "Gagal menyimpan berkas";
        }

        return response()->json($response);
    }

    public function destroy(Request $request){
        $response = [];
        $response['status'] = true;
        $response['message'] = "success";

        $siswa = Siswa::where('user_id', auth()->user()->id)->first();

        try{
            if($request->document_type == "ijazah"){
                if($siswa->ijazah != null){
                    Storage::disk('public')->delete('ijazah/'.$siswa->ijazah);
                }

                $siswa->update([
                    'ijazah' => null
                ]);
            }

            if($request->document_type == "kk"){
                if($siswa->kk != null){
                    Storage::disk('public')->delete('kk/'.$siswa->kk);
                }

                $siswa->update([
                    'kk' => null
                ]);
            }
        }catch(\Exception $e){
            $response['status'] = false;
            $response['message'] = "Gagal menghapus berkas";
        }

        return response()->json($response);
    }
}
