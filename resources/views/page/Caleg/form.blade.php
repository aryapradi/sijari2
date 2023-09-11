@extends('layout.main')

@section('content') 


<div class="container border rounded p-5" style="background-color:#ffffff">
    <h4 class="card-title mb-4" >Form Caleg</h4>
    <form action="/store_caleg" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="nama" class="text-dark">Nama</label>
            <input type="text" class="form-control" id="nama_caleg" name="nama_caleg"  placeholder="Enter Nama" required>
        </div>

        <div class="form-group mb-3">
            <label for="image" class="text-dark">Gambar</label>
            <input name='image' class="form-control" type="file" id="formFile" required>
        </div>

        <div class="form-group mb-3">
            <label for="">Partai</label>
            <select class="form-control" disabled  id="partai_id"  >
            <option selected value="">{{$partai->nama_partai}}</option>
        </select>
        <input type="hidden" name="partai_id" value="{{$partai->id}}">
        </div>
        

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-secondary ml-auto" href="/DataCaleg">Cancel</a>
            <button type="submit" class="btn btn-primary ml-auto">Submit</button>
        </div>
    </form>
</div>

@endsection