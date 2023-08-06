@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row" style="padding:20px">
    
        @include('layouts.partials.sidebar')

        <div class="col-md-9">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Informasi Penerimaan</div>
                        <div class="card-body" style="min-height: 300px;">

                            <div class="card">
                                <div class="card-header">Siswa Diterima</div>
                                <div class="card-body">
                                    <div id="table-diterima"></div>
                                </div>
                            </div>
                            <br>

                            <div class="card">
                                <div class="card-header">Siswa Cadangan</div>
                                <div class="card-body">
                                    <div id="table-cadangan"></div>
                                </div>
                            </div>
                            <br>

                            <div class="card">
                                <div class="card-header">Siswa Ditolak</div>
                                <div class="card-body">
                                    <div id="table-ditolak"></div>
                                </div>
                            </div>
                            <br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
    $(document).ready(function(){

        // TODO preparing table diterima
        var diterimaDataSource = new kendo.data.DataSource({
            transport: {
                read: function (options) {
                    $.ajax({
                        url: "{{ route('informasi.get') }}?status_id=1",
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

        $('#table-diterima').kendoGrid({
            dataSource: diterimaDataSource,
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
                    field: "alamat",
                    title: "Alamat",
                    headerAttributes: { style: "text-align: center" }
                },
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
                fields: ["nama","nisn"]
            },
            noRecords: true,
            sortable: true,
            pageable: {
                numeric: false,
                input: true,
                refresh: true,
                pageSizes: true,
            }
        });

        // TODO preparing table cadangan
        var cadanganDataSource = new kendo.data.DataSource({
            transport: {
                read: function (options) {
                    $.ajax({
                        url: "{{ route('informasi.get') }}?status_id=2",
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

        $('#table-cadangan').kendoGrid({
            dataSource: cadanganDataSource,
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
                    field: "alamat",
                    title: "Alamat",
                    headerAttributes: { style: "text-align: center" }
                },
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
                fields: ["nama","nisn"]
            },
            noRecords: true,
            sortable: true,
            pageable: {
                numeric: false,
                input: true,
                refresh: true,
                pageSizes: true,
            }
        });

        // TODO preparing table ditolak
        var ditolakDataSource = new kendo.data.DataSource({
            transport: {
                read: function (options) {
                    $.ajax({
                        url: "{{ route('informasi.get') }}?status_id=3",
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

        $('#table-ditolak').kendoGrid({
            dataSource: ditolakDataSource,
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
                    field: "alamat",
                    title: "Alamat",
                    headerAttributes: { style: "text-align: center" }
                },
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
                fields: ["nama","nisn"]
            },
            noRecords: true,
            sortable: true,
            pageable: {
                numeric: false,
                input: true,
                refresh: true,
                pageSizes: true,
            }
        });

    });
</script>

@endsection
