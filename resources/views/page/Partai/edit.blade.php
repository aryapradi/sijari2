@extends('layout.main')

@section('content') 

<div class="container border rounded p-5" style="background-color:#ffffff">
    <h4 class="card-title mb-4">Form Edit Partai</h4>
    <form action="/update_partai/{{ $data->id }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label class="text-dark">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $data->id }}" placeholder="Enter ID" disabled>
        </div>

        <div class="form-group mb-3">
            <label for="nama" class="text-dark">Nama</label>
            <input type="text" class="form-control" id="nama_partai" name="nama_partai" value="{{ $data->nama_partai }}" placeholder="Enter Nama">
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-secondary ml-auto" href="/DataPartai">Cancel</a>
            <button type="submit" class="btn btn-primary ml-auto">Submit</button>
        </div>
    </form>
</div>
@endsection
