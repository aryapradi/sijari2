@extends('layout.main')


@section('content')


<div class="card">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="card">
    <div class="card-body" style="display: flex; align-items: center;">
        <h4 class="card-title" style="margin-right: auto;">Data Koordinator</h4>
        <a href="/create_koordinator" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Kabupaten/kota</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Desa</th>
                    <th scope="col">Caleg</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
              @foreach ($data as $row)
              <tr>
                <?php dd ($row->desa->name)?>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->nama_koordinator }}</td>
                <td>{{ $row->username }}</td>
                <td>{{ $row->provinsi->name }}</td>
                <td>{{ $row->kabupaten }}</td>
                <td>{{ $row->kecamatan }}</td>
                <td>{{ $row->desa }}</td>
                <td>{{ $row->caleg->nama_caleg }}</td>
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