<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\WaliMurid;
use Illuminate\Http\Request;
Use Alert;
// use RealRashid\SweetAlert\Facades\Alert;

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
        $response = [];
        $response['status'] = true;
        $response['message'] = "Berhasil menyimpan data orang tua";

        // checking role
        if(!(auth()->user()->role_id == 2)){
            abort(403, 'Mohon maaf . Anda tidak memiliki hak akses untuk mengakses halaman ini.');
        }

        $siswa = Siswa::where('user_id', auth()->user()->id)->first();

        try{
            $existedAyah = WaliMurid::where([['siswa_id', $siswa->siswa_id],['jenis_wali_id', 1]])->first();
            if($existedAyah != null){ // if ayah exist then update
                $existedAyah->update([
                    'nama_wali' => $request->nama_ayah,
                    'tanggal_lahir' => $request->tanggal_lahir_ayah,
                    'tempat_lahir' => $request->tempat_lahir_ayah,
                    'pekerjaan' => $request->pekerjaan_ayah,
                ]);
            }else{ // else create ayah
                WaliMurid::create([
                    'siswa_id' => $siswa->siswa_id,
                    'nama_wali' => $request->nama_ayah,
                    'tanggal_lahir' => $request->tanggal_lahir_ayah,
                    'tempat_lahir' => $request->tempat_lahir_ayah,
                    'pekerjaan' => $request->pekerjaan_ayah,
                    'jenis_wali_id' => 1,
                ]);
            }

            $existedIbu = WaliMurid::where([['siswa_id', $siswa->siswa_id],['jenis_wali_id', 2]])->first();
            if($existedIbu != null){ // if ayah exist then update
                $existedIbu->update([
                    'nama_wali' => $request->nama_ibu,
                    'tanggal_lahir' => $request->tanggal_lahir_ibu,
                    'tempat_lahir' => $request->tempat_lahir_ibu,
                    'pekerjaan' => $request->pekerjaan_ibu,
                ]);
            }else{ // else create ibu
                WaliMurid::create([
                    'siswa_id' => $siswa->siswa_id,
                    'nama_wali' => $request->nama_ibu,
                    'tanggal_lahir' => $request->tanggal_lahir_ibu,
                    'tempat_lahir' => $request->tempat_lahir_ibu,
                    'pekerjaan' => $request->pekerjaan_ibu,
                    'jenis_wali_id' => 2,
                ]);
            }

        }catch(\Exception $e){
            $response['status'] = false;
            $response['message'] = "Gagal menyimpan data orang tua";
        }

        return response()->json($response);
    }
}
