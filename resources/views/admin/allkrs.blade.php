@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Halaman Daftar KRS
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman/</span> Daftar KRS</h4>
        <a href="{{ route('addkrs') }}" class="btn btn-outline-primary mb-3">
            + Tambah KRS
        </a>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif
        <div class="card">
            <h5 class="card-header fw-bold">Kartu Rencana Studi (KRS)</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th class="fw-bold" style="text-align: center;">Mahasiswa</th>
                            <th class="fw-bold" style="text-align: center;">Matakuliah</th>
                            <th class="fw-bold" style="text-align: center;">SKS</th>
                            <th class="fw-bold" style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($krs as $item)
                            <tr>
                                <td style="text-align: center;">
                                    {{ $item->mahasiswa->Nama ?? '-' }} ({{ $item->NIM }})
                                </td>
                                <td style="text-align: center;">
                                    {{ $item->matakuliah->Nama_mk ?? '-' }} ({{ $item->Kode_mk }})
                                </td>
                                <td style="text-align: center;">
                                    {{ $item->matakuliah->sks ?? '-' }}
                                </td>
                                <td style="text-align: center;">
                                    <a href="{{ route('deletekrs', ['NIM' => $item->NIM, 'Kode_mk' => $item->Kode_mk]) }}"
                                        class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data ini?')">
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