@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Tambah Ruang
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Tambah Ruang</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold fs-4">Tambah Ruang</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('storeruang') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="id_ruang">ID Ruang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_ruang" name="id_ruang" placeholder="R001"
                                    value="{{ old('id_ruang') }}" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama_ruang">Nama Ruang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_ruang" name="nama_ruang"
                                    placeholder="Ruang 1" value="{{ old('nama_ruang') }}" required />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-outline-primary">Tambah Ruang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection