@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Edit Presensi
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman/</span> Edit Presensi</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold fs-4">Edit Presensi</h5>
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
                    <form action="{{ route('updatepresensi') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_presensi" value="{{ $presensiinfo->id_presensi }}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="hari">Hari</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="hari" name="hari" required>
                                    <option value="">-- Pilih Hari --</option>
                                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $h)
                                        <option value="{{ $h }}" {{ $presensiinfo->hari == $h ? 'selected' : '' }}>
                                            {{ $h }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ $presensiinfo->tanggal instanceof \DateTime ? $presensiinfo->tanggal->format('Y-m-d') : $presensiinfo->tanggal }}"
                                    required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="NIM">Mahasiswa</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="NIM" name="NIM" required>
                                    <option value="">-- Pilih Mahasiswa --</option>
                                    @foreach ($mahasiswa as $mhs)
                                        <option value="{{ $mhs->NIM }}" {{ $presensiinfo->NIM == $mhs->NIM ? 'selected' : '' }}>
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
                                        <option value="{{ $mk->Kode_mk }}" {{ $presensiinfo->Kode_mk == $mk->Kode_mk ? 'selected' : '' }}>
                                            {{ $mk->Nama_mk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="status_kehadiran">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="status_kehadiran" name="status_kehadiran" required>
                                    <option value="Hadir" {{ $presensiinfo->status_kehadiran == 'Hadir' ? 'selected' : '' }}>
                                        Hadir</option>
                                    <option value="Izin" {{ $presensiinfo->status_kehadiran == 'Izin' ? 'selected' : '' }}>
                                        Izin</option>
                                    <option value="Sakit" {{ $presensiinfo->status_kehadiran == 'Sakit' ? 'selected' : '' }}>
                                        Sakit</option>
                                    <option value="Alpa" {{ $presensiinfo->status_kehadiran == 'Alpa' ? 'selected' : '' }}>
                                        Alpa</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-outline-primary">Update Presensi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection