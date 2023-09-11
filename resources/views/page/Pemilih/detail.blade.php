@extends('layout.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Detail Foto Pemilih</h2>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pemilih->nama }}</h5>
                        <!-- Tampilkan foto pemilih -->
                        @if ($pemilih->foto === null)
                            <img src="{{ asset('/placeholder.jpg') }}" alt="Foto Pemilih" class="img-fluid">
                        @else
                            <img src="{{ asset('/storage/'.$pemilih->foto) }}" alt="Foto Pemilih" class="img-fluid">
                        @endif
                        <!-- Tampilkan informasi lainnya jika diperlukan -->
                        <p class="card-text">No Telepon: {{ $pemilih->NoTlpn }}</p>
                        <p class="card-text">Kecamatan: {{ $pemilih->kecamatan }}</p>
                        <p class="card-text">Kelurahan: {{ $pemilih->kelurahan }}</p>
                        <p class="card-text">TPS: {{ $pemilih->tps }}</p>
                    </div>
                    <div class="form-group mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('pemilih') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
