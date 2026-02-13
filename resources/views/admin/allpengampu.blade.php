@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Halaman Daftar Pengampu
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman/</span> Daftar Pengampu</h4>
        <a href="{{ route('addpengampu') }}" class="btn btn-outline-primary mb-3">
            + Tambah Pengampu
        </a>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif
        <div class="card">
            <h5 class="card-header fw-bold">Daftar Pengampu Matakuliah</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th class="fw-bold" style="text-align: center;">Matakuliah</th>
                            <th class="fw-bold" style="text-align: center;">Dosen Pengampu</th>
                            <th class="fw-bold" style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($pengampu as $item)
                            <tr>
                                <td style="text-align: center;">
                                    {{ $item->matakuliah->Nama_mk ?? '-' }} ({{ $item->Kode_mk }})
                                </td>
                                <td style="text-align: center;">
                                    {{ $item->dosen->Nama ?? '-' }} ({{ $item->NIP }})
                                </td>
                                <td style="text-align: center;">
                                    <a href="{{ route('deletepengampu', ['Kode_mk' => $item->Kode_mk, 'NIP' => $item->NIP]) }}"
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