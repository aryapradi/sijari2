@extends('layout.main')


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

    .valid-status {
        color: white;
        background-color: green;
        border-radius: 5px;
        padding: 2px 6px;
    }

    .invalid-status {
        color: white;
        background-color: red;
        border-radius: 5px;
        padding: 2px 6px;
    }

    .card-image {
        text-align: center;
    }

    .card-image img {
        height: 90px;
        width: 90px;
        border: 1px solid #000;
        border-radius: 5px;
        display: block;
        margin: 0 auto;
    }

    .card-details {
        padding-left: 10px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Data Pemilih</h2>
            <hr>

            <a href="{{ route('dpt') }}" class="btn btn-success btn-sm" style="border-radius:5px">Tambah Data Pemilih</a>

            @if(session('success'))
                <div class="alert alert-success mt-4">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group col-md-6">
        <form action="/DataPemilih" method="Get">
            <input type="search" name="search" class="form-control" id="inputPassword4" placeholder="Masukkan Nama / TPS" style="border-radius: 10px; margin-bottom: 20px; border: 1px solid; margin-top:20px">
        </form>
    </div>

    <div class="row">
        @foreach ($dataPemilih as $index => $pemilih)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card" style="border-radius: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 card-image">
                            @if ($pemilih->foto === null)

                                <p>Tidak Ada Foto</p>
                            @else
                                <img src="{{ asset('/storage/'.$pemilih->foto) }}" alt="" srcset="">
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-8 card-details">
                            <p class="card-text" style="font-size: 12px;">Nama : {{ $pemilih->nama }}</p>
                            <p class="card-text" style="font-size: 12px;">No Telepon : {{ $pemilih->NoTlpn }}</p>
                            <p class="card-text" style="font-size: 12px;">Kecamatan : {{ $pemilih->kecamatan }}</p>
                            <p class="card-text" style="font-size: 12px;">Kelurahan : {{ $pemilih->kelurahan }}</p>
                            <p class="card-text" style="font-size: 12px;">TPS : {{ $pemilih->tps }}</p>
                            @if ($pemilih->foto)
                                <p class="card-text" style="font-size: 12px;">Status: <span class="valid-status">valid</span></p>
                            @else
                                <p class="card-text" style="font-size: 12px;">Status: <span class="invalid-status">tidak valid</span></p>
                            @endif
                        </div>
                    </div>
                    <hr style="margin-top: 10px; margin-bottom: 5px;">
                </div>
                <div class="card-footer">
                    <div class="btn-group" role="group">
                        <div class="card-footer">
                            <div class="btn-group-vertical btn-block">
                                <a href="{{ route('detail_foto', ['id' => $pemilih->id]) }}" class="btn btn-primary btn-sm mb-1" style="margin-top:-45px; margin-left:-25px; height:25px; border-radius:5px">Detail</a>
                                <a href="/edit_pemilih/{{ $pemilih->id }}" class="btn btn-info btn-sm mb-1" style="margin-left:-25px; height:25px; border-radius:5px">Edit</a>
                                <a href="/upload_foto/{{ $pemilih->id }}" class="btn btn-success btn-sm mb-1" style="margin-left:-25px; height:25px; border-radius:5px">Upload Foto</a>
                                <a href="/hapus_pemilih/{{ $pemilih->id }}" class="btn btn-danger btn-sm mb-1" style="margin-left:-25px; border-radius:5px" onclick="confirmDelete('{{ $pemilih->id }}')">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-12" style="margin-left: 80px">
            {{ $dataPemilih->links() }}
        </div>
    </div>
</div>

@endsection




