@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Halaman Daftar Jadwal
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman/</span> Daftar Jadwal</h4>
        <a href="{{ route('addjadwal') }}" class="btn btn-outline-primary mb-3">
            + Tambah Jadwal
        </a>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif
        <div class="card">
            <h5 class="card-header fw-bold">Jadwal Akademik</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th class="fw-bold" style="text-align: center;">Hari</th>
                            <th class="fw-bold" style="text-align: center;">Matakuliah</th>
                            <th class="fw-bold" style="text-align: center;">Ruang</th>
                            <th class="fw-bold" style="text-align: center;">Golongan</th>
                            <th class="fw-bold" style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($jadwal as $item)
                            <tr>
                                <td style="text-align: center;">{{ $item->hari }}</td>
                                <td style="text-align: center;">{{ $item->matakuliah->Nama_mk ?? '-' }}</td>
                                <td style="text-align: center;">{{ $item->ruang->nama_ruang ?? '-' }}</td>
                                <td style="text-align: center;">{{ $item->golongan->nama_Gol ?? '-' }}</td>
                                <td style="text-align: center;">
                                    <a href="{{ route('editjadwal', $item->id_jadwal) }}" class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <a href="{{ route('deletejadwal', $item->id_jadwal) }}" class="btn btn-danger"
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