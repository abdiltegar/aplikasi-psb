@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row" style="padding:20px">
    
        @include('layouts.partials.sidebar')

        <div class="col-md-9">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Data Orang Tua</div>
                        <div class="card-body text-center" style="min-height: 300px;">
                            <!-- Check if parent exist, then it can be edited, if not exist create -->
                            @if(count($parents) > 0)

                            @else
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
