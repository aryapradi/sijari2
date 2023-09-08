@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">Data Pemilih Potensial</h4>
            </div>
            <div class="card-footer">
                <a class="btn btn-outline-primary btn-sm" style="border-radius: 5px" href="{{ route('dpt') }}">Add Data</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($dataPemilih as $pemilih)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card" style="border-radius: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <div class="card-body">
                <h5 class="card-title">{{ $pemilih->nama }}</h5>
                <p class="card-text">NoTlpn: {{ $pemilih->NoTlpn }}</p>
                <p class="card-text">Kecamatan: {{ $pemilih->kecamatan }}</p>
                <p class="card-text">Kelurahan: {{ $pemilih->kelurahan }}</p>
                <p class="card-text">TPS: {{ $pemilih->tps }}</p>
            </div>
            <div class="card-footer">
                <a href="/edit_pemilih/{{ $pemilih->id }}" type="button" style="border-radius: 5px" class="btn btn-info btn-sm">Edit</a>
                <a type="button" href="/hapus_pemilih/{{ $pemilih->id }}" style="border-radius: 5px" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $pemilih->id }}')">Hapus</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-12">
        <!-- Tampilkan pagination links -->
        {{ $dataPemilih->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if ($message = Session::get('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ $message }}',
            showConfirmButton: false,
            timer: 5000
        });
    @endif

    @if ($message = Session::get('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ $message }}',
            showConfirmButton: false,
            timer: 5000
        });
    @endif

    
</script>
@endsection
