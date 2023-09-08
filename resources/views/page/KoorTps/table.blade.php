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

    // Fungsi untuk menampilkan SweetAlert konfirmasi penghapusan data
    function confirmDelete(saksiId) {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke halaman penghapusan jika pengguna mengonfirmasi penghapusan
                window.location.href = "/hapus_koortps/" + saksiId;
            }
        });
    }
</script>

<div class="row">
    <div class="col-12">
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
            </div>
        </div>
    </div>
</div>

@foreach ($saksiData as $saksi)
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table border table-striped table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>TPS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $saksi->nama }}</td>
                            <td>{{ $saksi->kecamatan }}</td>
                            <td>{{ $saksi->kelurahan }}</td>
                            <td>{{ $saksi->tps }}</td>
                            <td>
                                <a href="#" style="border-radius: 5px" class="btn btn-info btn-sm">Edit</a>
                                <a href="/hapus_koortps/{{ $saksi->id }}" style="border-radius: 5px" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $saksi->id }}')">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
