@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Edit Matakuliah
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman/</span> Edit Matakuliah</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold fs-4">Edit Matakuliah</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('updatematakuliah') }}" method="POST">
                        @csrf
                        <input type="hidden" name="original_kode" value="{{ $matakuliahinfo->Kode_mk }}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Kode_mk">Kode MK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Kode_mk" name="Kode_mk"
                                    value="{{ $matakuliahinfo->Kode_mk }}" readonly />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Nama_mk">Nama Matakuliah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nama_mk" name="Nama_mk"
                                    value="{{ $matakuliahinfo->Nama_mk }}" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="sks">SKS</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sks" name="sks" min="1" max="6"
                                    value="{{ $matakuliahinfo->sks }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="semester">Semester</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="semester" name="semester" min="1" max="8"
                                    value="{{ $matakuliahinfo->semester }}" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-outline-primary">Update Matakuliah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection