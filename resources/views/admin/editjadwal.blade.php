@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Edit Jadwal
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman/</span> Edit Jadwal</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold fs-4">Edit Jadwal</h5>
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
                    <form action="{{ route('updatejadwal') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_jadwal" value="{{ $jadwalinfo->id_jadwal }}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="hari">Hari</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="hari" name="hari" required>
                                    <option value="">-- Pilih Hari --</option>
                                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $h)
                                        <option value="{{ $h }}" {{ $jadwalinfo->hari == $h ? 'selected' : '' }}>
                                            {{ $h }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Kode_mk">Matakuliah</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="Kode_mk" name="Kode_mk">
                                    <option value="">-- Pilih Matakuliah --</option>
                                    @foreach ($matakuliah as $mk)
                                        <option value="{{ $mk->Kode_mk }}"
                                            {{ $jadwalinfo->Kode_mk == $mk->Kode_mk ? 'selected' : '' }}>
                                            {{ $mk->Nama_mk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="id_ruang">Ruang</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="id_ruang" name="id_ruang">
                                    <option value="">-- Pilih Ruang --</option>
                                    @foreach ($ruang as $r)
                                        <option value="{{ $r->id_ruang }}"
                                            {{ $jadwalinfo->id_ruang == $r->id_ruang ? 'selected' : '' }}>
                                            {{ $r->nama_ruang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="id_Gol">Golongan</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="id_Gol" name="id_Gol">
                                    <option value="">-- Pilih Golongan --</option>
                                    @foreach ($golongan as $g)
                                        <option value="{{ $g->id_Gol }}"
                                            {{ $jadwalinfo->id_Gol == $g->id_Gol ? 'selected' : '' }}>
                                            {{ $g->nama_Gol }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-outline-primary">Update Jadwal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
