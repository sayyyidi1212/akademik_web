@extends('admin.layouts.template')
@section('page_title')
  SIAKAD | Halaman Dashboard
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Admin</h4>

    <div class="row">
      <!-- Mahasiswa -->
      <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-user"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Mahasiswa</span>
            <h3 class="card-title mb-2">{{ $totalMahasiswa }}</h3>
          </div>
        </div>
      </div>

      <!-- Dosen -->
      <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="avatar-initial rounded bg-label-success"><i class="bx bx-user-check"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Dosen</span>
            <h3 class="card-title mb-2">{{ $totalDosen }}</h3>
          </div>
        </div>
      </div>

      <!-- Matakuliah -->
      <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-book"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Matakuliah</span>
            <h3 class="card-title mb-2">{{ $totalMatakuliah }}</h3>
          </div>
        </div>
      </div>

      <!-- Ruang -->
      <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-building-house"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Ruang</span>
            <h3 class="card-title mb-2">{{ $totalRuang }}</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Golongan -->
      <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-group"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Golongan</span>
            <h3 class="card-title mb-2">{{ $totalGolongan }}</h3>
          </div>
        </div>
      </div>

      <!-- Jadwal -->
      <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-calendar"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Jadwal</span>
            <h3 class="card-title mb-2">{{ $totalJadwal }}</h3>
          </div>
        </div>
      </div>

      <!-- KRS -->
      <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="avatar-initial rounded bg-label-dark"><i class="bx bx-book-open"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">KRS</span>
            <h3 class="card-title mb-2">{{ $totalKrs }}</h3>
          </div>
        </div>
      </div>

      <!-- Presensi -->
      <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-check-square"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Presensi</span>
            <h3 class="card-title mb-2">{{ $totalPresensi }}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection