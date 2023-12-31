<div class="col-md-3">
    <div class="card">
        <div class="card-body" style="padding:10px">
            @if(Auth::user()->role_id == 1)
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link sidebar-menu-link {{ request()->segment(1) == 'home' ? 'active' : 'link-dark' }}" href="{{ route('home') }}"><span class="k-icon k-i-home"></span> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-menu-link {{ request()->segment(1) == 'siswa' ? 'active' : 'link-dark' }}" href="{{ route('siswa') }}"><span class="k-icon k-i-user"></span> Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-menu-link {{ request()->segment(1) == 'informasi' ? 'active' : 'link-dark' }}" href="{{ route('informasi') }}"><span class="k-icon k-i-info-circle"></span> Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-menu-link {{ request()->segment(1) == 'pengguna' ? 'active' : 'link-dark' }}" href="{{ route('pengguna') }}"><span class="k-icon k-i-user"></span> Data Pengguna</a>
                </li>
            </ul>
            @elseif(Auth::user()->role_id == 2 && $siswa != null)
            <div id="student-profile" class="text-center" style="padding-top:20px">
                <img src="{{ asset('storage/photo') }}/{{$siswa->photo}}" class="preview-photo"><br><br>
                <table class="table table-sm table-striped table-bordered" style="text-align:left">
                    <tr><td>Nama </td><td> : </td><td>{{$siswa->nama}}</td></tr>
                    <tr><td>NISN </td><td> : </td><td>{{$siswa->nisn}}</td></tr>
                    <tr><td>NIK </td><td> : </td><td>{{$siswa->nik}}</td></tr>
                    <tr><td>Alamat </td><td> : </td><td>{{$siswa->alamat}}</td></tr>
                    <tr><td>Status </td><td> : </td><td>
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
    <br>
</div>