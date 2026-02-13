@extends('admin.layouts.template')
@section('page_title')
    SIAKAD | Edit Golongan
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Halaman/</span> Edit Golongan</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold fs-4">Edit Golongan</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('updategolongan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="original_id" value="{{ $golonganinfo->id_Gol }}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="id_Gol">ID Golongan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_Gol" name="id_Gol"
                                    value="{{ $golonganinfo->id_Gol }}" readonly />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama_Gol">Nama Golongan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_Gol" name="nama_Gol"
                                    value="{{ $golonganinfo->nama_Gol }}" required />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-outline-primary">Update Golongan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection