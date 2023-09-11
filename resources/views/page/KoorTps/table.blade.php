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




<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">Data Koordinator TPS</h4>
            </div>
            <div class="card-footer">
                <a class="btn btn-success btn-sm" style="border-radius: 5px" href="{{ route('dpt') }}">Tambah Data Koor TPS</a>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Data Koordinator TPS</h2>
            <hr>

            <a href="{{ route('dpt') }}" class="btn btn-success btn-sm" style="border-radius:5px">Tambah Data Koor TPS</a>

            @if(session('success'))
                <div class="alert alert-success mt-4">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

<div class="form-group col-md-6">
        <form action="/DataKoorTPS" method="Get">
            <input type="search" name="search" class="form-control" id="inputPassword4" placeholder="Masukkan Nama / TPS" style="border-radius: 10px; margin-bottom: 20px; border: 1px solid; margin-top:20px">
        </form>
    </div>

<div class="row">
    @foreach ($saksiData as $index => $saksi)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card" style="border-radius: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <div class="card-body">
                <h5 class="card-title">{{ $index + $saksiData->firstItem() }}</h5>
                <hr>
                <p class="card-text" style="font-weight: bold">Username: {{ $saksi->username }}</p>
                <p class="card-text">Nama: {{ $saksi->nama }}</p>
                <p class="card-text">No Telepon: {{ $saksi->NoTlpn }}</p>
                <p class="card-text">Kecamatan: {{ $saksi->kecamatan }}</p>
                <p class="card-text">Kelurahan: {{ $saksi->kelurahan }}</p>
                <p class="card-text">TPS: {{ $saksi->tps }}</p>
            </div>
            <hr style="margin-left:30px; margin-right:30px">
            {{-- <div class="card-footer">
                <a href="/edit_koortps/{{ $saksi->id }}" class="btn btn-info btn-sm" style="border-radius: 5px; margin-left: 90px; margin-top: 20px;">Edit</a>
                <a href="/hapus_koortps/{{ $saksi->id }}" class="btn btn-danger btn-sm" style="border-radius: 5px;" onclick="confirmDelete('{{ $saksi->id }}')">Hapus</a>
            </div> --}}

            <div class="card-footer">
                <div class="btn-group" role="group">
                    <div class="card-footer">
                        <div class="btn-group-vertical btn-block">
                            <a href="/edit_koortps/{{ $saksi->id }}" class="btn btn-info btn-sm mb-1" style="width: 100%;">Edit</a>
                            <a href="/hapus_koortps/{{ $saksi->id }}" class="btn btn-danger btn-sm mb-1" style="width: 100%;" onclick="confirmDelete('{{ $saksi->id }}')">Hapus</a>
                        </div>
                    </div>
                </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Koordinator TPS</h4>
                <div class="btn-group mb-3">
                    <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle"
                        style="width: 100px; border-radius:5px" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Add Data
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">Input Manual</a>
                        <a class="dropdown-item" href="{{ route('dpt') }}">Input Dpt</a>
                    </div>
                    
                </div>
                <div class="table-responsive">  
                    <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Kecamatan</th>
                                <th>kelurahan</th>
                                <th>TPS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($saksiData as $saksi)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $saksi->nama }}</td>
                                <td>{{ $saksi->kecamatan }}</td>
                                <td>{{ $saksi->kelurahan }}</td>
                                <td>{{ $saksi->tps }}</td>
                                <td>
                                    <a href=""
                                        style="border-radius: 5px" class="btn btn-info btn-sm">Edit</a>
                                    <a  type="button" href="/hapus_koortps/{{ $saksi->id }}" style="border-radius: 5px" class="btn btn-danger btn-sm">Hapus</a>
                                   
                                </td>
                            </tr>
                            @endforeach
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import Caleg Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="/import_dpt" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control" type="file" name="file" required>
                    </div>
                    <div class="modal-footer">
                        <a href="/download_Template" class="btn btn-primary">Unduh Template Excel</a>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete All Data Modal -->
    <div class="modal fade" id="deleteAllDataModal" tabindex="-1" aria-labelledby="deleteAllDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAllDataModalLabel">Delete All Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/delete_all_data" method="GET">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Anda Yakin Ingin Menghapus Semua Data Dpt ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
            
            
            
        </div>
    </div>


</div>
<div class="row">
    <div class="col-12" style="margin-left: 55px">
        <!-- Tampilkan pagination links -->
        {{ $saksiData->links() }}
    </div>
</div>
@endsection
