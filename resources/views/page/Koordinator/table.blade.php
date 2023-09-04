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
        <h4 class="card-title" style="margin-right: auto;">Data Koordinator</h4>
        <a href="/create_koordinator" class="btn btn-outline-primary btn-sm" style="border-radius: 5px">Tambah Data</a>
    </div>    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">kelurahan</th>
                    <th scope="col">Caleg</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
              @foreach ($data as $row)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->nama_koordinator }}</td>
                <td>{{ $row->username }}</td>
                <td>{{ $row->districts->name }}</td>
                <td>{{ $row->villages->name }}</td>
                <td>{{ $row->caleg->nama_caleg }}</td>
                <td>
                    <div class="btn-group">
                        <a type="button" class="btn btn-success btn-sm mr-1" style="border-radius: 5px; font-size: 15px; margin-right: 20px;" href="/edit_koordinator/{{ $row->id }}">Edit</a>
                        <a  type="button" class="btn btn-danger btn-sm mr-1" style="border-radius: 5px; font-size: 15px; margin-right: 20px;" href="{{ route('hapus_koordinator', [$row->id]) }}">Hapus</a>
                    </div>
                    
                </td>
            </tr>  
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
