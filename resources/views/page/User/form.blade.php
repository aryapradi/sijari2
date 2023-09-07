@extends('layout.main')

@section('content') 

<div class="container border rounded p-5" style="background-color: #ffffff">
    <h4 class="card-title mb-4">Form User</h4>
    <form action="{{route('store_user')}}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name" class="text-dark">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" required>
        </div>
        <div class="form-group mb-3">
            <label for="email" class="text-dark">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Alamat Email" required>
        </div>
        <div class="form-group">
            <label class="form-label text-dark">Role</label>
            <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                <option value="1" {{ old('role') == '1' ? 'selected' : 'Super Admin' }}>Super Admin</option>
                <option value="2" {{ old('role') == '2' ? 'selected' : 'Admin' }}>Admin</option>
                <option value="3" {{ old('role') == '3' ? 'selected' : 'Fasilitator' }}>Fasilitator</option>
                <option value="4" {{ old('role') == '4' ? 'selected' : 'Koor TPS' }}>Koor TPS</option>
            </select>
            @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label text-dark" for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <script>
            const passwordInput = document.getElementById("password");
            const showPasswordCheckbox = document.getElementById("showPassword");
        
            showPasswordCheckbox.addEventListener("change", function () {
                if (showPasswordCheckbox.checked) {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            });
        </script>
        

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-secondary ml-auto" href="/DataUser" style="margin-top: 20px">Cancel</a>
            <button type="submit" class="btn btn-primary ml-auto" style="margin-top: 20px">Submit</button>
        </div>
    </form>
</div>

@endsection
