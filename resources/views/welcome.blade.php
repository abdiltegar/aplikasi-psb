@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center" style="margin-top: 150px;">
            <h2>SELAMAT DATANG DI<br>APLIKASI PENERIMAAN SISWA BARU</h2>
            <br>
            <a href="{{ route('register') }}" class="btn btn-lg btn-primary">DAFTAR SEKARANG</a>
        </div>
    </div>
</div>
@endsection
