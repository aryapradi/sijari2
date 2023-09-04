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
    <div class="card-body d-flex align-items-center">
        <h4 class="card-title" style="margin-right: auto;">Data Partai</h4>
        <a href="/create_partai" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Partai</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nama_partai }}</td>
                        <td>
                            <div class="btn-group" >
                                <a href="/edit_partai/{{$row->id}}" class="btn btn-success btn-sm mr-1" style="font-size: 15px; margin-right: 20px; border-radius:5px ">Edit</a>
                                @if(count($caleg) === 0)         
                                <form action="{{ route('hapus_partai', ['id' => $row->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius:5px">Hapus</button>
                                </form>
                                @else
                                <button type="submit" disabled class="btn btn-danger btn-sm" style="border-radius:5px" title="hapus data caleg terlebih dahulu">Hapus</button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
