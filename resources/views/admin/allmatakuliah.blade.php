@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Halaman Daftar Matakuliah
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman/</span> Daftar Matakuliah</h4>
        <a href="{{ route('addmatakuliah') }}" class="btn btn-outline-primary mb-3">
            + Tambah Matakuliah
        </a>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif
        <div class="card">
            <h5 class="card-header fw-bold">Matakuliah Yang Tersedia</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th class="fw-bold" style="text-align: center;">Kode MK</th>
                            <th class="fw-bold" style="text-align: center;">Nama Matakuliah</th>
                            <th class="fw-bold" style="text-align: center;">SKS</th>
                            <th class="fw-bold" style="text-align: center;">Semester</th>
                            <th class="fw-bold" style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($matakuliah as $item)
                            <tr>
                                <td style="text-align: center;">{{ $item->Kode_mk }}</td>
                                <td style="text-align: center;">{{ $item->Nama_mk }}</td>
                                <td style="text-align: center;">{{ $item->sks }}</td>
                                <td style="text-align: center;">{{ $item->semester }}</td>
                                <td style="text-align: center;">
                                    <a href="{{ route('editmatakuliah', $item->Kode_mk) }}" class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <a href="{{ route('deletematakuliah', $item->Kode_mk) }}" class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin hapus data ini?')">
                                        <i class="fas fa-trash-alt me-1"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection