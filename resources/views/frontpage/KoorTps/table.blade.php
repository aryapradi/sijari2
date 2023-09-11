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

{{-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Koordinator TPS</h4>
                <div class="btn-group mb-3">
                    <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle"
                        style="border-radius: 5px" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Add Data
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">Input Manual</a>
                        <a class="dropdown-item" href="{{ route('listdpt') }}">Input Dpt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">Data Koordinator TPS</h4>
            </div>
            <div class="card-footer">
                <a class="btn btn-success btn-sm" style="border-radius: 5px" href="{{ route('listdpt') }}">Tambah Data Koor TPS</a>
            </div>
        </div>
    </div>
</div>

<div class="form-group col-md-6">
    <form action="/DataKoorTPS" method="Get">
    <input type="search" name="search" class="form-control" id="inputPassword4" placeholder="Masukkan Nama / TPS" style="border-radius:10px; margin-bottom:10px; border:1px solid;">
    </form>
</div>

<div class="row">
    @foreach ($saksiData as$index  =>$saksi)
    <div class="col-lg-4 col-md-6 col-sm-12 ">
        <div class="card" style="border-radius: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <div class="card-body">
                <p class="card-text">Nama: {{ $saksi->nama }}</p>
                <p class="card-text">Username: {{ $saksi->username }}</p>
                <p class="card-text">No Telepon: {{ $saksi->NoTlpn }}</p>
                <p class="card-text">Kecamatan: {{ $saksi->kecamatan }}</p>
                <p class="card-text">Kelurahan: {{ $saksi->kelurahan }}</p>
                <p class="card-text">TPS: {{ $saksi->tps }}</p>
            </div>
            <div class="card-footer">
                <a href="/edit_koortps/{{ $saksi->id }}" type="button" style="border-radius: 5px; margin-left:90px;" class="btn btn-info btn-sm">Edit</a>
                <a type="button" href="/hapus_koortps/{{ $saksi->id }}" style="border-radius: 5px" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $saksi->id }}')">Hapus</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col-12" style="margin-left: 55px">
        <!-- Tampilkan pagination links -->
        {{ $saksiData->links() }}
        
    </div>
</div>
@endsection
