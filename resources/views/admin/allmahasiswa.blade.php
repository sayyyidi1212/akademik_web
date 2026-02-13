@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Halaman Daftar Mahasiswa
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman/</span> Daftar Mahasiswa</h4>
        <a href="{{ route('addmahasiswa') }}" class="btn btn-outline-primary mb-3">
            + Tambah Mahasiswa
        </a>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif
        <div class="card">
            <h5 class="card-header fw-bold">Mahasiswa Yang Terdaftar</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th class="fw-bold" style="text-align: center;">NIM</th>
                            <th class="fw-bold" style="text-align: center;">Nama</th>
                            <th class="fw-bold" style="text-align: center;">Golongan</th>
                            <th class="fw-bold" style="text-align: center;">Semester</th>
                            <th class="fw-bold" style="text-align: center;">No HP</th>
                            <th class="fw-bold" style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($mahasiswa as $item)
                            <tr>
                                <td style="text-align: center;">{{ $item->NIM }}</td>
                                <td style="text-align: center;">{{ $item->Nama }}</td>
                                <td style="text-align: center;">{{ $item->golongan->nama_Gol ?? '-' }}</td>
                                <td style="text-align: center;">{{ $item->Semester ?? '-' }}</td>
                                <td style="text-align: center;">{{ $item->Nohp ?? '-' }}</td>
                                <td style="text-align: center;">
                                    <a href="{{ route('editmahasiswa', $item->NIM) }}" class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <a href="{{ route('deletemahasiswa', $item->NIM) }}" class="btn btn-danger"
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