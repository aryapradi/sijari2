@extends('layout.main')

@section('content')









<div class="container border rounded p-5" style="background-color: #ffffff">
    <h4 class="card-title mb-4">Form Input Manual </h4>
    <form action="/store_partai" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="" class="text-dark"></label>
            <input type="text" class="form-control" id="" name="" placeholder="Masukkan " required>
        </div>

        <div class="form-group mb-3">
            <label for="" class="text-dark"></label>
            <input type="text" class="form-control" id="" name="" placeholder="Masukkan " required>
        </div>

        <div class="form-group mb-3">
            <label for="" class="text-dark"></label>
            <input type="text" class="form-control" id="" name="" placeholder="Masukkan " required>
        </div>

        <div class="form-group mb-3">
            <label for="" class="text-dark"></label>
            <input type="text" class="form-control" id="" name="" placeholder="Masukkan " required>
        </div>

        <div class="form-group mb-3">
            <label for="" class="text-dark"></label>
            <input type="text" class="form-control" id="" name="" placeholder="Masukkan " required>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-secondary ml-auto" href="/DataKoorTPS">Cancel</a>
            <button type="submit" class="btn btn-primary ml-auto">Submit</button>
        </div>
    </form>
</div>
















@endsection