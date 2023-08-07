@extends('layouts.app')

@section('content')

<div class="modal fade" id="formStatusModal" tabindex="-1" aria-labelledby="formStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formStatusModalLabel">Ubah Status Siswa</h5>
                <button type="button" class="btn btn-sm btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="form-status-siswa_id">
                <div class="form-group">
                    <table class="table table-sm table-striped">
                        <tr><td>Nama </td><td id="form-status-nama_siswa"></td></tr>
                        <tr><td>NISN </td><td id="form-status-nisn"></td></tr>
                        <tr><td>NIK </td><td id="form-status-nik"></td></tr>
                        <tr><td>Alamat </td><td id="form-status-alamat"></td></tr>
                    </table>
                </div>
                <div class="form-group">
                    <label for="status_id" class="col-form-label">Status</label>
                    <select class="form-select" id="form-status-status_id">
                        @foreach($statuses as $status)
                        <option value="{{ $status->status_id }}">{{ $status->nama_status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitUbahStatus()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row" style="padding:20px">
    
        @include('layouts.partials.sidebar')

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Data Siswa</div>
                        <div class="card-body" style="min-height: 300px;">
                            <form action="#" class="form-inline">
                                <div class="form-group col-md-4 row">
                                    <label for="filter-status" class="col-md-4 col-form-label">Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" id="filter-status">
                                            <option value="4">Semua</option>
                                            <option value="0">Belum Diproses</option>
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->status_id }}">{{ $status->nama_status }}</option>   
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <div id="table-siswa"></div>
                            <script type="text/x-kendo-template" id="detailTemplate">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{asset('storage/photo')}}/#= photo #" class="preview-photo">
                                    </div>
                                    <div class="col-md-10">
                                        <br>
                                        <table class="table table-sm table-striped">
                                            <tr><td>Nama </td><td>#= nama #</td></tr>
                                            <tr><td>NISN </td><td>#= nisn #</td></tr>
                                            <tr><td>NIK </td><td>#= nik #</td></tr>
                                            <tr><td>Alamat </td><td>#= alamat #</td></tr>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-header">
                                        Data Orang Tua
                                    </div>
                                    <div class="card-body data-ortu">
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-header">
                                        Berkas
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-striped">
                                            <tr>
                                                <td>Ijazah</td>
                                                <td><a class="btn btn-sm btn-link" href="{{asset('storage/ijazah')}}/#= ijazah #" target="_blank">#= ijazah #</a></td>
                                            </tr>
                                            <tr>
                                                <td>Kartu Keluarga</td>
                                                <td><a class="btn btn-sm btn-link" href="{{asset('storage/kk')}}/#= kk #" target="_blank">#= kk #</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <center>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="\#formStatusModal" data-siswa_id="#= siswa_id #" data-nama_siswa="#= nama #" data-nisn="#= nisn #" data-nik="#= nik #" data-alamat="#= alamat #">Ubah Status</button>
                                </center>
                                <br>
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $(document).ready( function () {
        var siswaDataSource = new kendo.data.DataSource({
            transport: {
                read: function (options) {
                    options.data.status_id = $('#filter-status').val();

                    $.ajax({
                        url: "{{ route('siswa.get') }}?status_id="+$('#filter-status').val(),
                        type: "GET",
                        data: options.data,
                        success: function (res) {
                            console.log(res);
                            options.success(res);
                        }
                    });
                }
            },
            schema: {
                data: "data",
                total: "total",
                model: {
                    id: "siswa_id",
                },
            },
            pageSize: 10
        });

        $('#table-siswa').kendoGrid({
            dataSource: siswaDataSource,
            columns: [
                {
                    field: "nisn",
                    width: 110,
                    title: "NISN",
                    headerAttributes: { style: "text-align: center" }
                },
                {
                    field: "nama",
                    title: "Nama",
                    headerAttributes: { style: "text-align: center" }
                },
                {
                    field: "nik",
                    title: "NIK",
                    headerAttributes: { style: "text-align: center" }
                },
                {
                    template: function(data) {
                        return data.jenis_kelamin == 1 ? 'Laki - Laki' : 'Perempuan';
                    },
                    title: "Jenis Kelamin",
                    headerAttributes: { style: "text-align: center" }
                },
                {
                    template: function(data) {
                        return data.tempat_lahir + ", " + indoDate(data.tanggal_lahir)
                    },
                    width: 200,
                    title: "Tempat, Tanggal Lahir",
                    headerAttributes: { style: "text-align: center" }
                },
                {
                    template: function(data){
                        if(data.status != null && data.status_id == 1){
                            return '<span style="color:green">'+data.status.nama_status+'</span>';
                        }else if(data.status != null && data.status_id == 2){
                            return '<span style="color:blue">'+data.status.nama_status+'</span>';
                        }else if(data.status != null && data.status_id == 3){
                            return '<span style="color:red">'+data.status.nama_status+'</span>';
                        }else{
                            return "Belum diproses";
                        }
                    },
                    title: "Status",
                    headerAttributes: { style: "text-align: center" }
                }
            ],
            dataBinding: function() {
                record = (this.dataSource.page() -1) * this.dataSource.pageSize();
            },
            toolbar: [
                {
                    name: "search"
                }
            ],
            search: {
                fields: ["nama","nisn","nik"]
            },
            edit: function (e) {},
            detailTemplate: kendo.template($("#detailTemplate").html()),
            detailInit: detailInit,
            noRecords: true,
            sortable: true,
            pageable: {
                numeric: false,
                input: true,
                refresh: true,
                pageSizes: true,
            }
        });

        function detailInit(e) {
            detailRow = e.detailRow;

            detailRow.find(".data-ortu").empty();

            var stringDataOrtu = "<div class='row'>";

            $.each( e.data.wali_murids, function( key, value ) {
                stringDataOrtu += "<div class='col-md-6'><div class='card'><div class='card-header'>"+(value.jenis_wali_id == 1 ? "Data Ayah" : "Data Ibu")+"</div><div class='card-body'>"+
                "<table class='table table-sm table-striped'>"+
                    "<tr>"+
                        "<td>Nama</td>"+
                        "<td>"+value.nama_wali+"</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td>Tempat, Tanggal Lahir</td>"+
                        "<td>" + value.tempat_lahir + ", " + indoDate(value.tanggal_lahir) + "</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td>Nama</td>"+
                        "<td>"+value.pekerjaan+"</td>"+
                    "</tr>"+
                "</table>"+
                "</div></div></div><br>";
            });
            stringDataOrtu += "</div>";

            detailRow.find(".data-ortu").append(stringDataOrtu);
        };

        $('#filter-status').change(function(){
            $('#table-siswa').data('kendoGrid').dataSource.read();
        });

        $('#formStatusModal').on('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var siswa_id = button.getAttribute('data-siswa_id')
            var nama_siswa = button.getAttribute('data-nama_siswa')
            var nisn = button.getAttribute('data-nisn')
            var nik = button.getAttribute('data-nik')
            var alamat = button.getAttribute('data-alamat')
            
            var modal = $(this)
            $('#form-status-siswa_id').val(siswa_id);
            $('#form-status-nama_siswa').text(nama_siswa);
            $('#form-status-nisn').text(nisn);
            $('#form-status-nik').text(nik);
            $('#form-status-alamat').text(alamat);
        });
    });

    function submitUbahStatus(){
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            url: "{{ route('siswa.ubah-status') }}",
            type: "PATCH",
            data: {
                siswa_id : $('#form-status-siswa_id').val(),
                status_id : $('#form-status-status_id').val()
            },
            success: function (res) {
                console.log(res);
                if(res.status){
                    Swal.fire(
                        'Berhasil!',
                        'Berhasil merubah status siswa',
                        'success'
                    )
                    $('#table-siswa').data('kendoGrid').dataSource.read();
                }else{
                    Swal.fire(
                        'Gagal!',
                        'Gagal merubah status siswa! '+ res.message,
                        'error'
                    )
                }
            }
        });
    }
</script>

@endsection
