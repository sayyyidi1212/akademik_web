@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Tambah Mahasiswa
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Tambah Mahasiswa</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold fs-4">Tambah Mahasiswa</h5>
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
                    <form action="{{ route('storemahasiswa') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="NIM">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="NIM" name="NIM" placeholder="2241720001"
                                    value="{{ old('NIM') }}" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Nama">Nama Mahasiswa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Ahmad Fauzi"
                                    value="{{ old('Nama') }}" required />
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
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Semester">Semester</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="Semester" name="Semester" placeholder="1"
                                    min="1" max="14" value="{{ old('Semester') }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="id_Gol">Golongan</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="id_Gol" name="id_Gol">
                                    <option value="">-- Pilih Golongan --</option>
                                    @foreach($golongan as $gol)
                                        <option value="{{ $gol->id_Gol }}" {{ old('id_Gol') == $gol->id_Gol ? 'selected' : '' }}>
                                            {{ $gol->nama_Gol }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-outline-primary">Tambah Mahasiswa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection