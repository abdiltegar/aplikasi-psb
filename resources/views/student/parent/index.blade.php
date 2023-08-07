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
                            <form method="POST" id="form-orang-tua">
                                @csrf
                                @method('PATCH')

                                <div class="card">
                                    <div class="card-header">
                                        Data Ayah
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label for="nama_ayah" class="col-md-3 col-form-label text-md-end">Nama</label>

                                            <div class="col-md-8">
                                                <input type="text" id="nama_ayah" class="editable form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ $ayah != null ? $ayah->nama_wali : old('nama_ayah') }}" required autocomplete="nama_ayah" {{$ayah != null ? 'readonly' : ''}}>

                                                @error('nama_ayah')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="tanggal_lahir_ayah" class="col-md-3 col-form-label text-md-end">Tempat, Tanggal Lahir</label>

                                            <div class="col-md-5">
                                                <input type="text" id="tempat_lahir_ayah" class="editable form-control @error('tempat_lahir_ayah') is-invalid @enderror" name="tempat_lahir_ayah" value="{{ $ayah != null ? $ayah->tempat_lahir : old('tempat_lahir_ayah') }}" required autocomplete="tempat_lahir_ayah" {{$ayah != null ? 'readonly' : ''}}>

                                                @error('tempat_lahir_ayah')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <input type="date" id="tanggal_lahir_ayah" class="editable form-control @error('tanggal_lahir_ayah') is-invalid @enderror" name="tanggal_lahir_ayah" value="{{ $ayah != null ? Date('Y-m-d', strtotime($ayah->tanggal_lahir)) : old('tanggal_lahir_ayah') }}" required autocomplete="tanggal_lahir_ayah" {{$ayah != null ? 'readonly' : ''}}>

                                                @error('tanggal_lahir_ayah')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="pekerjaan_ayah" class="col-md-3 col-form-label text-md-end">Pekerjaan</label>

                                            <div class="col-md-8">
                                                <input type="text" id="pekerjaan_ayah" class="editable form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" value="{{ $ayah != null ? $ayah->pekerjaan : old('pekerjaan_ayah') }}" required autocomplete="pekerjaan_ayah" {{$ayah != null ? 'readonly' : ''}}>

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
                                            <label for="nama_ibu" class="col-md-3 col-form-label text-md-end">Nama</label>

                                            <div class="col-md-8">
                                                <input type="text" id="nama_ibu" class="editable form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ $ibu != null ? $ibu->nama_wali : old('nama_ibu') }}" required autocomplete="nama_ibu" {{$ibu != null ? 'readonly' : ''}}>

                                                @error('nama_ibu')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="tanggal_lahir_ibu" class="col-md-3 col-form-label text-md-end">Tempat, Tanggal Lahir</label>

                                            <div class="col-md-5">
                                                <input type="text" id="tempat_lahir_ibu" class="editable form-control @error('tempat_lahir_ibu') is-invalid @enderror" name="tempat_lahir_ibu" value="{{ $ibu != null ? $ibu->tempat_lahir : old('tempat_lahir_ibu') }}" required autocomplete="tempat_lahir_ibu" {{$ibu != null ? 'readonly' : ''}}>

                                                @error('tempat_lahir_ibu')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <input type="date" id="tanggal_lahir_ibu" class="editable form-control @error('tanggal_lahir_ibu') is-invalid @enderror" name="tanggal_lahir_ibu" value="{{ $ibu != null ? Date('Y-m-d', strtotime($ibu->tanggal_lahir)) : old('tanggal_lahir_ibu') }}" required autocomplete="tanggal_lahir_ibu" {{$ibu != null ? 'readonly' : ''}}>

                                                @error('tanggal_lahir_ibu')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="pekerjaan_ibu" class="col-md-3 col-form-label text-md-end">Pekerjaan</label>

                                            <div class="col-md-8">
                                                <input type="text" id="pekerjaan_ibu" class="editable form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" value="{{ $ibu != null ? $ibu->pekerjaan : old('pekerjaan_ibu') }}" required autocomplete="pekerjaan_ibu" {{$ibu != null ? 'readonly' : ''}}>

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
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        @if($ayah != null && $ibu != null)
                                        <button type="button" class="btn btn-sm btn-primary" onclick="openEditable()" id="btn-edit">Edit</button>
                                        @endif
                                        <button type="button" class="btn btn-sm btn-success" style="{{$ayah != null && $ibu != null ? 'display:none' : 'display:inline'}}" id="btn-simpan" onclick="simpan()">Simpan</button>
                                        <button type="button" class="btn btn-sm btn-danger" style="display:none" id="btn-cancel" onclick="closeEditable()">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
    function openEditable(){
        $('.editable').removeAttr('readonly');

        $('#btn-simpan').css('display', 'inline');
        $('#btn-cancel').css('display', 'inline');
        $('#btn-edit').css('display', 'none');
    }

    function closeEditable(){
        $('.editable').removeAttr('readonly');
        $('.editable').attr('readonly');

        $('#btn-simpan').css('display', 'none');
        $('#btn-cancel').css('display', 'none');
        $('#btn-edit').css('display', 'inline');
    }

    function simpan(){
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            url: "{{ route('data-orang-tua.patch') }}",
            type: "PATCH",
            data: $('#form-orang-tua').serialize(),
            success: function (res) {
                console.log(res);
                if(res.status){
                    Swal.fire(
                        'Berhasil!',
                        res.message,
                        'success'
                    );
                }else{
                    Swal.fire(
                        'Gagal!',
                        res.message,
                        'error'
                    );
                }
            }
        });
    }
</script>

@endsection
