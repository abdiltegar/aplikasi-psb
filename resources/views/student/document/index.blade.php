@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row" style="padding:20px">
    
        @include('layouts.partials.sidebar')

        <div class="col-md-9">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Berkas</div>
                        <div class="card-body text-center" style="min-height: 300px;">
                            <div class="row mb-3">
                                <label for="ijazah" class="col-md-2 col-form-label text-md-end">Ijazah Terakhir</label>

                                <div class="col-md-8">
                                    <input type="file" id="ijazah" class="form-control" name="ijazah">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kk" class="col-md-2 col-form-label text-md-end">Kartu Keluarga</label>

                                <div class="col-md-8">
                                    <input type="file" id="kk" class="form-control" name="kk">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
