@extends('admin.layouts.template')

@section('page_title')
    SIAKAD | Halaman Tambah Dosen Baru
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Halaman /</span> Tambah Dosen
        </h4>

        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold fs-4">Tambah Dosen</h5>
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

                    <form action="{{ route('storedosen') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="NIP">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="NIP" name="NIP" placeholder="1234567890"
                                    value="{{ old('NIP') }}" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Nama">Nama Dosen</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nama" name="Nama"
                                    placeholder="Dr. Ahmad Subagyo" value="{{ old('Nama') }}" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Alamat">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="Alamat" name="Alamat" rows="3"
                                    placeholder="Jl. Contoh No. 123">{{ old('Alamat') }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Nohp">No HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nohp" name="Nohp" placeholder="08123456789"
                                    value="{{ old('Nohp') }}" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-outline-primary">
                                    Tambah Dosen
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection