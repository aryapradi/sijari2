@extends('layout.main')

@section('content') 

<div class="container border rounded p-5" style="background-color:#ffffff">
    <h4 class="card-title mb-4">Form Edit Partai</h4>
    <form action="/update_caleg/{{ $data->id }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label class="text-dark">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $data->id }}" placeholder="Enter ID" disabled>
        </div>

        <div class="form-group mb-3">
            <label for="nama" class="text-dark">Nama</label>
            <input type="text" class="form-control" id="nama_caleg" name="nama_caleg" value="{{ $data->nama_caleg }}" placeholder="Enter Nama">
        </div>

        <div class="form-group mb-3">
            <label for="">Partai</label>
            <select class="form-control" name="partai_id" id="partai_id">
                <option value="{{ $data->partai->id }}" selected>{{ $data->partai->nama_partai }}</option>
                @foreach ($partai as $par)
                    @if ($par->id !== $data->partai->id)
                        <option value="{{ $par->id }}">{{ $par->nama_partai }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-secondary ml-auto" href="/DataCaleg">Cancel</a>
            <button type="submit" class="btn btn-primary ml-auto">Submit</button>
        </div>
    </form>
</div>
@endsection
