@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Tambah KRS
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Tambah KRS</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold fs-4">Tambah KRS</h5>
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
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session()->get('error') }}</div>
                    @endif
                    <form action="{{ route('storekrs') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="NIM">Mahasiswa</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="NIM" name="NIM" required>
                                    <option value="">-- Pilih Mahasiswa --</option>
                                    @foreach ($mahasiswa as $mhs)
                                        <option value="{{ $mhs->NIM }}" {{ old('NIM') == $mhs->NIM ? 'selected' : '' }}>
                                            {{ $mhs->Nama }} ({{ $mhs->NIM }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Kode_mk">Matakuliah</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="Kode_mk" name="Kode_mk" required>
                                    <option value="">-- Pilih Matakuliah --</option>
                                    @foreach ($matakuliah as $mk)
                                        <option value="{{ $mk->Kode_mk }}" {{ old('Kode_mk') == $mk->Kode_mk ? 'selected' : '' }}>
                                            {{ $mk->Nama_mk }} ({{ $mk->Kode_mk }}) - {{ $mk->sks }} SKS
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-outline-primary">Tambah KRS</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection