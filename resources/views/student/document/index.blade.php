@extends('layouts.app')

@section('content')

<div class="modal fade" id="formIjazahModal" tabindex="-1" aria-labelledby="formIjazahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formIjazahModalLabel">Upload Ijazah</h5>
                <button type="button" class="btn btn-sm btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form-ijazah" enctype="multipart/form-data">
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="ijazah" class="col-md-4 col-form-label text-md-end">Ijazah Terakhir</label>
                        <div class="col-md-8">
                            <input type="file" id="ijazah" class="form-control" name="ijazah">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitIjazah()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formKKModal" tabindex="-1" aria-labelledby="formKKModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formKKModalLabel">Upload Kartu Keluarga</h5>
                <button type="button" class="btn btn-sm btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form-kk" enctype="multipart/form-data">
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="kk" class="col-md-4 col-form-label text-md-end">Kartu Keluarga</label>
                        <div class="col-md-8">
                            <input type="file" id="kk" class="form-control" name="kk">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitKK()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row" style="padding:20px">
    
        @include('layouts.partials.sidebar')

        <div class="col-md-9">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Berkas</div>
                        <div class="card-body" >
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Jenis Berkas</th>
                                            <th>Nama File</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ijazah</td>
                                            <td>{{ $siswa->ijazah != null ? "<a href='".asset("storage/ijazah")."/".$siswa->ijazah."'>".$siswa->ijazah."</a>" : "kosong" }}</td>
                                            <td class="text-center">
                                                @if($siswa->ijazah != null)
                                                <button id="open-add-ijazah" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#formIjazahModal">Edit</button>
                                                <button id="open-delete-ijazah" class="btn btn-sm btn-danger">Hapus</button>
                                                @else
                                                <button id="open-add-ijazah" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#formIjazahModal">Tambah</button>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kartu Keluarga</td>
                                            <td>{{ $siswa->kk != null ? "<a href='".asset("storage/kk")."/".$siswa->kk."'>".$siswa->kk."</a>" : "kosong" }}</td>
                                            <td class="text-center">
                                                @if($siswa->kk != null)
                                                <button id="open-add-kk" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#formKKModal">Edit</button>
                                                <button id="open-delete-kk" class="btn btn-sm btn-danger">Hapus</button>
                                                @else
                                                <button id="open-add-kk" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#formKKModal">Tambah</button>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
    function submitIjazah(){
        var form = $('#form-ijazah')[0];
        var data = new FormData(form);

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            url: "{{ route('berkas.patch') }}",
            type: "POST",
            enctype: 'multipart/form-data',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
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

    function submitKK(){
        var form = $('#form-kk')[0];
        var data = new FormData(form);

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            url: "{{ route('berkas.patch') }}",
            type: "POST",
            enctype: 'multipart/form-data',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
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
