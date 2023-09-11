@extends('layout.main')

@section('content') 

<div class="container border rounded p-5" style="background-color: #ffffff">
    <h4 class="card-title mb-4">Form Token WhatsApp</h4>
    <form action="/update_token/{{ $data->id }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nama" class="text-dark">Token</label>
            <input type="text" class="form-control" id="token" name="token" value="{{ $data->token }}" required>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-secondary ml-auto" href="/DataToken">Cancel</a>
            <button type="submit" class="btn btn-primary ml-auto">Submit</button>
        </div>
    </form>
</div>

@endsection
