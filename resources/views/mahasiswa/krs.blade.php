@extends('mahasiswa.layouts.template')
@section('page_title')
    SIAKAD | Kartu Rencana Studi
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Akademik /</span> KRS</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Kartu Rencana Studi (KRS)</h5>
                <span class="badge bg-primary">Total SKS: {{ $krs->sum('matakuliah.sks') }}</span>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th class="fw-bold" style="text-align: center;">Kode MK</th>
                            <th class="fw-bold" style="text-align: center;">Matakuliah</th>
                            <th class="fw-bold" style="text-align: center;">SKS</th>
                            <th class="fw-bold" style="text-align: center;">Semester</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($krs as $item)
                            <tr>
                                <td style="text-align: center;">{{ $item->Kode_mk }}</td>
                                <td style="text-align: center;">{{ $item->matakuliah->Nama_mk ?? '-' }}</td>
                                <td style="text-align: center;">{{ $item->matakuliah->sks ?? '-' }}</td>
                                <td style="text-align: center;">{{ $item->matakuliah->semester ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data KRS.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection