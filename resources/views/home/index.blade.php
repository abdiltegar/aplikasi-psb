@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row" style="padding:20px">
    
        @include('layouts.partials.sidebar')

        <div class="col-md-9">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body text-center" style="min-height: 300px;">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            Selamat Datang di Aplikasi Penerimaan Siswa Baru !!

                            <br><br>
                            @if(Auth::user()->role_id == 2)
                                @if($siswa->status_id == 1)
                                <div class="alert alert-info">
                                    Selamat ! Anda <b>{{ $siswa->status->nama_status}}</b>.
                                </div>
                                @elseif($siswa->status_id == 2)
                                <div class="alert alert-info">
                                    Selamat ! Anda dinyatakan sebagai <b>{{ $siswa->status->nama_status}}</b>.
                                </div>
                                @elseif($siswa->status_id == 3)
                                <div class="alert alert-danger">
                                    Mohon maaf, anda <b>{{ $siswa->status->nama_status}}</b>. Jangan patah semangat !
                                </div>
                                @elseif(count($siswa->wali_murids) == 2 && $siswa->photo != null && $siswa->ijazah != null &&$siswa->kk != null)
                                <div class="alert alert-info">
                                    <b>Yay !! Berkas dan Data Orang Tua Telah Lengkap !</b><br>Silahkan menunggu persetujuan oleh admin.
                                </div>
                                @else
                                    @if(count($siswa->wali_murids) < 2)
                                    <div class="alert alert-info">
                                        Silahkan lengkapi data orang tua pada menu <a href="{{ route('data-orang-tua') }}" target="_blank">Data Orang Tua</a>.
                                    </div>
                                    @endif
                                    @if($siswa->ijazah == null || $siswa->kk == null)
                                    <div class="alert alert-info">
                                        Silahkan lengkapi berkas - berkas anda pada menu <a href="{{ route('berkas') }}" target="_blank">Berkas</a>.
                                    </div>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
