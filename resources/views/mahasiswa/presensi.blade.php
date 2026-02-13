@extends('mahasiswa.layouts.template')
@section('page_title')
    SIAKAD | Data Presensi
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Akademik /</span> Presensi</h4>

        <div class="card">
            <h5 class="card-header fw-bold">Riwayat Presensi</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th class="fw-bold" style="text-align: center;">Tanggal</th>
                            <th class="fw-bold" style="text-align: center;">Matakuliah</th>
                            <th class="fw-bold" style="text-align: center;">Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($presensi as $item)
                            <tr>
                                <td style="text-align: center;">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}<br>
                                    <small class="text-muted">{{ $item->hari }}</small>
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada data presensi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection