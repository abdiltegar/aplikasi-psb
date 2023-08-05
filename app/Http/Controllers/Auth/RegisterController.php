<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\WaliMurid;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nisn' => ['required', 'string', 'min:10', 'max:10'],
            'nik' => ['required', 'string', 'min:16', 'max:16'],
            'jenis_kelamin' => ['required'],
            'tanggal_lahir' => ['required'],
            'tempat_lahir' => ['required'],
            'nama_ayah' => ['required'],
            'tanggal_lahir_ayah' => ['required'],
            'tempat_lahir_ayah' => ['required'],
            'pekerjaan_ayah' => ['required'],
            'nama_ibu' => ['required'],
            'tanggal_lahir_ibu' => ['required'],
            'tempat_lahir_ibu' => ['required'],
            'pekerjaan_ibu' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        // TODO creating auth user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        if($user != null && $user->id > 0){
            try{
                $photo = null;
                $ijazah = null;
                $kk = null;

                if(request()->hasFile('photo')){
                    $filePhoto = request()->file('photo');

                    $photo = $filePhoto->getClientOriginalName();
                    $filePhoto->storeAs('public/photo', $photo);
                }

                if(request()->hasFile('ijazah')){
                    $filePhoto = request()->file('ijazah');

                    $ijazah = $filePhoto->getClientOriginalName();
                    $filePhoto->storeAs('public/ijazah', $ijazah);
                }

                if(request()->hasFile('kk')){
                    $filePhoto = request()->file('kk');

                    $kk = $filePhoto->getClientOriginalName();
                    $filePhoto->storeAs('public/kk', $kk);
                }
                
                // TODO creating data siswa
                $siswa_id = Siswa::insertGetId([
                    'user_id' => $user->id,
                    'nama' => $user->name,
                    'nisn' => $data['nisn'],
                    'nik' => $data['nik'],
                    'jenis_kelamin' => $data['jenis_kelamin'],
                    'tanggal_lahir' => $data['tanggal_lahir'],
                    'tempat_lahir' => $data['tempat_lahir'],
                    'alamat' => $data['alamat'],
                    'photo' => $photo,
                    'ijazah' => $ijazah,
                    'kk' => $kk
                ]);

                // TODO Insert data ayah
                WaliMurid::create([
                    'siswa_id' => $siswa_id,
                    'nama_wali' => $data['nama_ayah'],
                    'pekerjaan' => $data['pekerjaan_ayah'],
                    'tanggal_lahir' => $data['tanggal_lahir_ayah'],
                    'tempat_lahir' => $data['tempat_lahir_ayah'],
                    'jenis_wali_id' => 1
                ]);

                // TODO Insert data ibu
                WaliMurid::create([
                    'siswa_id' => $siswa_id,
                    'nama_wali' => $data['nama_ibu'],
                    'pekerjaan' => $data['pekerjaan_ibu'],
                    'tanggal_lahir' => $data['tanggal_lahir_ibu'],
                    'tempat_lahir' => $data['tempat_lahir_ibu'],
                    'jenis_wali_id' => 2
                ]);

            }catch(\Exception $e){
                $user->delete();
            }

            return $user;
        }else{
            return $user;
        }
    }
}
