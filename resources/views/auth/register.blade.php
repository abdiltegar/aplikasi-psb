@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding:20px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pendaftaran Siswa Baru</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                Data Diri
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="name" class="col-md-2 col-form-label text-md-end">Nama</label>

                                    <div class="col-md-9">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nisn" class="col-md-2 col-form-label text-md-end">NISN</label>

                                    <div class="col-md-4">
                                        <input id="nisn" type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" required autocomplete="nisn" autofocus max="10" min="10">

                                        @error('nisn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nik" class="col-md-2 col-form-label text-md-end">NIK</label>

                                    <div class="col-md-4">
                                        <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus min="16" max="16">

                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-2 col-form-label text-md-end">E-Mail</label>

                                    <div class="col-md-9">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-2 col-form-label text-md-end">Password</label>

                                    <div class="col-md-9">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-2 col-form-label text-md-end">Konfirmasi Password</label>

                                    <div class="col-md-9">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="jenis_kelamin" class="col-md-2 col-form-label text-md-end">Jenis Kelamin</label>

                                    <div class="col-md-2">
                                        <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required autocomplete="jenis_kelamin">
                                            <option value="1" {{ old('jenis_kelamin') == 1 ? 'selected' : '' }}>Laki - Laki</option>
                                            <option value="2" {{ old('jenis_kelamin') == 2 ? 'selected' : '' }}>Perempuan</option>
                                        </select>

                                        @error('jenis_kelamin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tanggal_lahir" class="col-md-2 col-form-label text-md-end">Tempat, Tanggal Lahir</label>

                                    <div class="col-md-5">
                                        <input type="text" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required autocomplete="tempat_lahir">

                                        @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <input type="date" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required autocomplete="tanggal_lahir">

                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamat" class="col-md-2 col-form-label text-md-end">Alamat</label>

                                    <div class="col-md-8">
                                        <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="alamat">{{ old('alamat') }}</textarea>

                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Data Ayah
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="nama_ayah" class="col-md-2 col-form-label text-md-end">Nama</label>

                                    <div class="col-md-8">
                                        <input type="text" id="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ old('nama_ayah') }}" required autocomplete="nama_ayah">

                                        @error('nama_ayah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tanggal_lahir_ayah" class="col-md-2 col-form-label text-md-end">Tempat, Tanggal Lahir</label>

                                    <div class="col-md-5">
                                        <input type="text" id="tempat_lahir_ayah" class="form-control @error('tempat_lahir_ayah') is-invalid @enderror" name="tempat_lahir_ayah" value="{{ old('tempat_lahir_ayah') }}" required autocomplete="tempat_lahir_ayah">

                                        @error('tempat_lahir_ayah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <input type="date" id="tanggal_lahir_ayah" class="form-control @error('tanggal_lahir_ayah') is-invalid @enderror" name="tanggal_lahir_ayah" value="{{ old('tanggal_lahir_ayah') }}" required autocomplete="tanggal_lahir_ayah">

                                        @error('tanggal_lahir_ayah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="pekerjaan_ayah" class="col-md-2 col-form-label text-md-end">Pekerjaan</label>

                                    <div class="col-md-8">
                                        <input type="text" id="pekerjaan_ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required autocomplete="pekerjaan_ayah">

                                        @error('pekerjaan_ayah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Data Ibu
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="nama_ibu" class="col-md-2 col-form-label text-md-end">Nama</label>

                                    <div class="col-md-8">
                                        <input type="text" id="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ old('nama_ibu') }}" required autocomplete="nama_ibu">

                                        @error('nama_ibu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tanggal_lahir_ibu" class="col-md-2 col-form-label text-md-end">Tempat, Tanggal Lahir</label>

                                    <div class="col-md-5">
                                        <input type="text" id="tempat_lahir_ibu" class="form-control @error('tempat_lahir_ibu') is-invalid @enderror" name="tempat_lahir_ibu" value="{{ old('tempat_lahir_ibu') }}" required autocomplete="tempat_lahir_ibu">

                                        @error('tempat_lahir_ibu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <input type="date" id="tanggal_lahir_ibu" class="form-control @error('tanggal_lahir_ibu') is-invalid @enderror" name="tanggal_lahir_ibu" value="{{ old('tanggal_lahir_ibu') }}" required autocomplete="tanggal_lahir_ibu">

                                        @error('tanggal_lahir_ibu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="pekerjaan_ibu" class="col-md-2 col-form-label text-md-end">Pekerjaan</label>

                                    <div class="col-md-8">
                                        <input type="text" id="pekerjaan_ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required autocomplete="pekerjaan_ibu">

                                        @error('pekerjaan_ibu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Berkas Siswa
                            </div>
                            <div class="card-body">

                                <div class="row mb-3">
                                    <label for="ijazah" class="col-md-2 col-form-label text-md-end">Ijazah Terakhir</label>

                                    <div class="col-md-8">
                                        <input type="file" id="ijazah" class="form-control" name="ijazah">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="kk" class="col-md-2 col-form-label text-md-end">Kartu Keluarga</label>

                                    <div class="col-md-8">
                                        <input type="file" id="kk" class="form-control" name="kk">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="photo" class="col-md-2 col-form-label text-md-end">Foto</label>

                                    <div class="col-md-8">
                                        <input type="file" id="photo" class="form-control" name="photo"  accept="image/*" onchange="loadFile(event)">
                                        <br>
                                        <img id="output" class="preview-photo">
                                        <script>
                                            var loadFile = function(event) {
                                                var output = document.getElementById('output');
                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                    output.onload = function() {
                                                    URL.revokeObjectURL(output.src) // free memory
                                                }
                                            };
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
