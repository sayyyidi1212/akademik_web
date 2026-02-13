@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Halaman Daftar Dosen
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman/</span> Daftar Dosen</h4>
        <a href="{{ route('adddosen') }}" class="btn btn-outline-primary mb-3">
            + Tambah Dosen
        </a>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card">
            <h5 class="card-header fw-bold">Dosen Yang Tersedia</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th class="fw-bold" style="text-align: center;">NIP</th>
                            <th class="fw-bold" style="text-align: center;">Nama</th>
                            <th class="fw-bold" style="text-align: center;">Alamat</th>
                            <th class="fw-bold" style="text-align: center;">No HP</th>
                            <th class="fw-bold" style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($dosen as $item)
                            <tr>
                                <td style="text-align: center;">{{ $item->NIP }}</td>
                                <td style="text-align: center;">{{ $item->Nama }}</td>
                                <td style="text-align: center;">{{ $item->Alamat ?? '-' }}</td>
                                <td style="text-align: center;">{{ $item->Nohp ?? '-' }}</td>
                                <td style="text-align: center;">
                                    <a href="{{ route('editdosen', $item->NIP) }}" class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <a href="{{ route('deletedosen', $item->NIP) }}" class="btn btn-danger"
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