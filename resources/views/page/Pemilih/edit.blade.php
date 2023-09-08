@extends('layout.main')


@section('content') 


<div class="container border rounded p-5" style="background-color:#ffffff">
    <h4 class="card-title mb-4" >Edit Pemilih</h4>
    <form action="/update_pemilih/{{ $data->id }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nama" class="text-dark">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama}}" placeholder="Enter Nama" required>
            @error('nama_koordiantor')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

            <div class="form-group mb-3">
                <label for="NoTlpn" class="text-dark">No Telepon</label>
                <input type="number" class="form-control" id="NoTlpn" name="NoTlpn" value="{{ $data->NoTlpn }}" placeholder="Enter your Telepon" required>
                @error('Notlpn')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="form-group mb-3">
                <label for="kecamatan" class="text-dark">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $data->kecamatan }}" placeholder="Enter your Telepon" required>
                @error('kecamatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="form-group mb-3">
                <label for="kelurahan" class="text-dark">Kelurahan</label>
                <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="{{ $data->kelurahan }}" placeholder="Enter your Telepon" required>
                @error('kelurahan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-secondary ml-auto" href="/DataPemilih" >Cancel</a>
            <button type="submit"class="btn btn-primary ml-auto" style="margin-left: 15px">Submit</button>
        </div>
    </form>
</div>


@endsection