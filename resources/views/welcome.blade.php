@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center" style="margin-top: 150px;">
            <h2 class="text-white">SELAMAT DATANG DI<br>APLIKASI PENERIMAAN SISWA BARU</h2>
            <br>
            <a href="{{ route('register') }}" class="btn btn-lg btn-primary">DAFTAR SEKARANG</a>
            <br><br>
            <span class="text-white">atau</span>
            <br>
            <a class="btn btn-light" href="{{ route('login') }}">Masuk</a>
        </div>
    </div>
</div>
@endsection
