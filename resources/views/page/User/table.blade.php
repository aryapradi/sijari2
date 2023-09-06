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
    <div class="card">
        <div class="card-body d-flex align-items-center">
            <h4 class="card-title" style="margin-right: auto;">Data User</h4>
            <a href="/create_user" class="btn btn-outline-primary btn-sm" style="border-radius: 5px">Tambah Data</a>
        </div>
    
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($data as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('detail_user', ['id' => $user->id]) }}" class="btn btn-info btn-sm mr-1" style="border-radius: 5px">Detail</a>
                                    <a href="{{ route('edit_user', ['id' => $user->id]) }}" class="btn btn-success btn-sm mr-1" style="border-radius: 5px; margin-left:10px">Edit</a>
                                    
                                    <form action="{{ route('hapus_user', ['id' => $user->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 5px; margin-left:10px">Hapus</button>
                                    </form>
                                </div>
                                
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
