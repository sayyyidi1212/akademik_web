@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Halaman Daftar Presensi
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman/</span> Daftar Presensi</h4>
        <a href="{{ route('addpresensi') }}" class="btn btn-outline-primary mb-3">
            + Tambah Presensi
        </a>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif
        <div class="card">
            <h5 class="card-header fw-bold">Presensi Akademik</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th class="fw-bold" style="text-align: center;">Tanggal</th>
                            <th class="fw-bold" style="text-align: center;">Mahasiswa</th>
                            <th class="fw-bold" style="text-align: center;">Matakuliah</th>
                            <th class="fw-bold" style="text-align: center;">Status</th>
                            <th class="fw-bold" style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($presensi as $item)
                            <tr>
                                <td style="text-align: center;">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}<br>
                                    <small class="text-muted">{{ $item->hari }}</small>
                                </td>
                                <td style="text-align: center;">
                                    {{ $item->mahasiswa->Nama ?? '-' }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $item->matakuliah->Nama_mk ?? '-' }}
                                </td>
                                <td style="text-align: center;">
                                    @php
                                        $badgeClass = match ($item->status_kehadiran) {
                                            'Hadir' => 'bg-success',
                                            'Izin' => 'bg-info',
                                            'Sakit' => 'bg-warning',
                                            'Alpa' => 'bg-danger',
                                            default => 'bg-secondary',
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ $item->status_kehadiran }}</span>
                                </td>
                                <td style="text-align: center;">
                                    <a href="{{ route('editpresensi', $item->id_presensi) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('deletepresensi', $item->id_presensi) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin hapus data ini?')">
                                        <i class="fas fa-trash-alt"></i>
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