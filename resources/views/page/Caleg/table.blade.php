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
        <h4 class="card-title" style="margin-right: auto;">Data Caleg</h4>
        <a href="/create_caleg"  class="btn btn-outline-primary btn-sm" style="border-radius: 5px">Tambah Data</a>
    </div>    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Caleg</th>
                    <th scope="col">Partai</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
              @foreach ($data as $row)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->nama_caleg }}</td>
                <td>{{ $row->partai->nama_partai }}</td>
                <td>
                    <div class="btn-group">
                        <a type="button" class="btn btn-success btn-sm mr-1" style="border-radius: 5px; font-size: 15px; margin-right: 20px;" href="/edit_caleg/{{ $row->id }}">Edit</a>
                    <a type="button" class="btn btn-danger btn-sm" style="border-radius: 5px;" href="/hapus_caleg/{{ $row->id }}">Hapus</a>
                    </div>
                    
                </td>
            </tr>  
              @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
