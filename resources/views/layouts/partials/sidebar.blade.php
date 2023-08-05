<div class="col-md-3">
    <div class="card">
        <div class="card-body" style="padding:10px">
            @if(Auth::user()->role_id == 2 && $siswa != null)
            <div id="student-profile" class="text-center" style="padding-top:20px">
                <img src="{{ asset('storage/photo') }}/{{$siswa->photo}}" class="preview-photo"><br><br>
                <table class="table table-sm table-striped" style="text-align:left">
                    <tr><td>Nama </td><td> : {{$siswa->nama}}</td></tr>
                    <tr><td>NISN </td><td> : {{$siswa->nisn}}</td></tr>
                    <tr><td>NIK </td><td> : {{$siswa->nik}}</td></tr>
                    <tr><td>Alamat </td><td> : {{$siswa->alamat}}</td></tr>
                    <tr><td>Status </td><td> : 
                        @if($siswa->status != null && $siswa->status_id == 1)
                        <span style="color:green">{{ $siswa->status->nama_status }}</span>
                        @elseif($siswa->status != null && $siswa->status_id == 2)
                        <span style="color:blue">{{ $siswa->status->nama_status }}</span>
                        @elseif($siswa->status != null && $siswa->status_id == 3)
                        <span style="color:red">{{ $siswa->status->nama_status }}</span>
                        @else
                        <span>Belum Diproses</span>
                        @endif
                    </td></tr>
                </table>
                <button class="btn btn-sm btn-light">Edit Profil</button>
            </div>
            @endif
        </div>
    </div>
</div>