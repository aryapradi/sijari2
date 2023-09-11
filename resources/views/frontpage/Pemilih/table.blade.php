@extends('layout.frontmain')

@section('content')
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

<style>
    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        display: none;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">Data Pemilih Potensial</h4>
            </div>
            <div class="card-footer">
                <a class="btn btn-success btn-sm" style="border-radius: 5px" href="{{ route('listdpt') }}">Tambah Data Pemilih</a>
            </div>
        </div>
    </div>
</div>


<div class="form-group col-md-6">
    <form action="/DataPemilih" method="Get">
    <input type="search" name="search" class="form-control" id="inputPassword4" placeholder="Masukkan Nama / TPS" style="border-radius:10px; margin-bottom:10px; border:1px solid;">
    </form>
</div>

<div class="row">
    @foreach ($dataPemilih as$index =>$pemilih)
    <div class="col-lg-4 col-md-6 col-sm-12 ">
        <div class="card" style="border-radius: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <div class="card-body">
                <h5 class="card-title">{{ $index + $dataPemilih->firstItem() }}</h5>
                <p class="card-text">Nama : {{ $pemilih->nama }}</p>
                <p class="card-text">No Telepon : {{ $pemilih->NoTlpn }}</p>
                <p class="card-text">Kecamatan : {{ $pemilih->kecamatan }}</p>
                <p class="card-text">Kelurahan : {{ $pemilih->kelurahan }}</p>
                <p class="card-text">TPS : {{ $pemilih->tps }}</p>
            </div>
            
            <div class="card-footer">
                <a href="/edit_pemilih/{{ $pemilih->id }}" type="button" style="border-radius: 5px; margin-left:90px" class="btn btn-info btn-sm">Edit</a>
                <a type="button" href="/hapus_pemilih/{{ $pemilih->id }}" style="border-radius: 5px" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $pemilih->id }}')">Hapus</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-12" style="margin-left: 80px">
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
