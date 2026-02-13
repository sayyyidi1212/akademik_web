@extends('admin.layouts.template')
@section('page_title')
CIME | Halaman Dashboard
@endsection
@section('js')
<script src="{{ asset('assets/apexcharts/dist/apexcharts.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/apexcharts/dist/apexcharts.css') }}" />

<!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('dashboard2/assets/img/icons/logocime.png') }}" type="image/png" />

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

@section('content')
<!-- Content wrapper -->

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            

            

            
            
        </div>
    </div>
</div>

@push('scripts')
<script>
    
</script>
@endpush


@endsection
