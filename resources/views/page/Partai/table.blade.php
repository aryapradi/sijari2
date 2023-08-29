@extends('layout.main')


@section('content')
    
<div class="card">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
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
                                <form action="{{ route('hapus_partai', ['id' => $row->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius:5px">Hapus</button>
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
