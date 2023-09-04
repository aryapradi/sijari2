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
</script>

<div class="card">
    <div class="card-body" style="display: flex; align-items: center;">
        <h4 class="card-title" style="margin-right: auto;">Data Saksi</h4>
        <a href="/create_koordinator" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">K   elurahan</th>
                    <th scope="col">Caleg</th>
                    <th scope="col">TPS</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <div class="btn-group">
                        <a type="button" class="btn btn-success btn-lg mr-1" style="border-radius: 5px; font-size: 15px; margin-right: 20px;" href="">Edit</a>
                        <a  type="button" class="btn btn-danger btn-lg mr-1" style="border-radius: 5px; font-size: 15px; margin-right: 20px;" href="">Hapus</a>
                    </div>
                    
                </td>
            </tr>  
            </tbody>
        </table>
    </div>
</div>
@endsection
