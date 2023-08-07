@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row" style="padding:20px">
    
        @include('layouts.partials.sidebar')

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Data Pengguna</div>
                        <div class="card-body" style="min-height: 300px;">
                            <div id="table-pengguna"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/x-kendo-template" id="editPopupTemplate">
    <div class="k-edit-label">
        <label for="email">Email <i class="text-danger">*</i></label>
    </div>
    <div data-container-for="email" class="k-edit-field">
        <input type="text" class="k-input k-textbox" name="email" style="width: 100%" required="required" data-bind="value:email" validationMessage="Field tidak boleh kosong">
        <span class="k-invalid-msg" data-for="email"></span>
    </div>

    <div class="k-edit-label">
        <label for="password">Password</label>
    </div>
    <div data-container-for="password" class="k-edit-field">
        <input type="text" class="k-input k-textbox" name="password">
        <span style="color:grey;font-size:11px;">Kosongkan password jika tidak ingin merubah password</span>
        <span class="k-invalid-msg" data-for="password"></span>
    </div>
    
</script>

<script>

    $(document).ready( function () {
        var penggunaDataSource = new kendo.data.DataSource({
            transport: {
                read: function (options) {
                    options.data.status_id = $('#filter-status').val();

                    $.ajax({
                        url: "{{ route('pengguna.get') }}",
                        type: "GET",
                        data: options.data,
                        success: function (res) {
                            console.log(res);
                            options.success(res);
                        }
                    });
                },
                update: function (options) {
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                        },
                        url: "{{ route('pengguna.update') }}",
                        type: "PUT",
                        data: options.data,
                        dataType: "json",
                        success: function (res) {
                            options.success(res);

                            if(res.status){
                                Swal.fire(
                                    'Berhasil!',
                                    'Berhasil mengubah akun',
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    'Gagal mengubah akun',
                                    'error'
                                )
                            }
                        },
                        complete: function (e) {
                            $("#table-pengguna").data("kendoGrid").dataSource.read();
                        }
                    });
                }
            },
            schema: {
                data: "data",
                total: "total",
                model: {
                    id: "id",
                },
            },
            pageSize: 10
        });

        $('#table-pengguna').kendoGrid({
            dataSource: penggunaDataSource,
            columns: [
                {
                    field: "name",
                    title: "Nama",
                    headerAttributes: { style: "text-align: center" }
                },
                {
                    field: "email",
                    title: "Email",
                    headerAttributes: { style: "text-align: center" }
                },
                {
                    template: function(data) {
                        return data.role_id == 1 ? 'Admin' : 'Siswa';
                    },
                    title: "Hak Akses",
                    headerAttributes: { style: "text-align: center" }
                },
                {
                    template: function(data) {
                        return indoDateTime(data.created_at);
                    },
                    title: "Dibuat Pada",
                    headerAttributes: { style: "text-align: center" }
                },
                {
                    headerTemplate: "<span class='k-icon k-i-gear'></span>",
                    headerAttributes: { class: "table-header-cell", style: "text-align: center" },
                    attributes: { class: "table-cell", style: "text-align: center" },
                    width: "180px", 
                    command: [
                        {
                            name: "edit",
                            text: {
                                edit: "Edit",
                                update: "Simpan",
                                cancel: "Batal"
                            },
                            visible: function(data){
                                return data.role_id != 1
                            }
                        },
                        {
                            name: "customDeleteRincian",
                            iconClass: "k-icon k-i-trash",
                            text: "Hapus",
                            click: hapusAkun,
                            visible: function(data){
                                return data.role_id != 1
                            }
                        }
                    ], 
                    // hidden: function(data) {
                    //     console.log('data',data);
                    //     return data.role_id != 1;
                    // },
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
                fields: ["name","email"]
            },
            edit: function (e) {
                e.container.parent().find('.k-window-title').text(e.model.isNew() ? "Tambah Data" : "Edit Data");
            },
            editable: {
                mode: "popup",
                template: $("#editPopupTemplate").html()
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

    function hapusAkun(e) {
        e.preventDefault();

        var tr = $(e.target).closest("tr"),
        data = this.dataItem(tr);

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang telah dihapus akan hilang beserta data - data yang berkaitan dengan siswa ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    url: "{{ route('pengguna.destroy') }}",
                    type: "DELETE",
                    data: {
                        id : data.id,
                    },
                    success: function (res) {
                        console.log(res);
                        if(res.status){
                            Swal.fire(
                                'Berhasil!',
                                'Berhasil menghapus akun',
                                'success'
                            )
                            $('#table-siswa').data('kendoGrid').dataSource.read();
                        }else{
                            Swal.fire(
                                'Gagal!',
                                'Gagal menghapus akun! '+ res.message,
                                'error'
                            )
                        }
                    }
                });
                
                // Swal.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                // )
            }
        })
    }
</script>

@endsection
