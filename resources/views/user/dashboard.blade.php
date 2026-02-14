@extends('user.layouts.template')
@section('page_title')
    SIAKAD | Mahasiswa Dashboard
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Mahasiswa</h4>

        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang, {{ $mahasiswa->Nama }}! 🎉</h5>
                                <p class="mb-4">
                                    Kamu saat ini berada di Semester <span
                                        class="fw-bold">{{ $mahasiswa->Semester }}</span>.
                                    Jangan lupa cek jadwal kuliah dan presensi kamu ya.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <span class="avatar-initial rounded bg-label-success"><i
                                                class="bx bx-book"></i></span>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Total SKS</span>
                                <h3 class="card-title mb-2">{{ $sks_total }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <span class="avatar-initial rounded bg-label-info"><i
                                                class="bx bx-check-square"></i></span>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Kehadiran</span>
                                <h3 class="card-title mb-2">{{ $kehadiran_count }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Informasi Akademik</h5>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="bx bx-id-card"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">NIM</h6>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $mahasiswa->NIM }}</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-secondary"><i
                                            class="bx bx-home"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Golongan</h6>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $mahasiswa->golongan->nama_Gol ?? '-' }}</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-phone"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">No HP</h6>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $mahasiswa->Nohp ?? '-' }}</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection