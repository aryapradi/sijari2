@extends('layout.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form action="/update_user/{{ $user->id }}" method="POST">
                        @csrf
                        @method('post') {{-- Menggunakan metode PUT untuk pembaruan --}}

                        <div class="form-group">
                            <label for="name" class="text-dark">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="text-dark">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label text-dark">Role</label>
                            <select id="role" class="form-control" name="role" required>
                                <option value="1" {{ old('role', $user->role) == '1' ? 'selected' : '' }}>Super Admin</option>
                                <option value="2" {{ old('role', $user->role) == '2' ? 'selected' : '' }}>Admin</option>
                                <option value="3" {{ old('role', $user->role) == '3' ? 'selected' : '' }}>Bebas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="old_password" class="text-dark">Password Lama</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Password Lama">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-dark">Password Baru (Kosongkan jika tidak ingin mengganti)</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Minimal 8">
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a class="btn btn-secondary" href="/DataUser" style="margin-top: 10px">Cancel</a>
                            <button type="submit" class="btn btn-primary" style="margin-top: 10px">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const oldPasswordInput = document.getElementById('old_password');
        const passwordInput = document.getElementById('password');

        const showPassword = (input, checkbox) => {
            input.type = checkbox.checked ? 'text' : 'password';
        };

        const showOldPasswordCheckbox = document.getElementById('show_old_password');
        showOldPasswordCheckbox.addEventListener('change', function() {
            showPassword(oldPasswordInput, this);
        });

        const showPasswordCheckbox = document.getElementById('show_password');
        showPasswordCheckbox.addEventListener('change', function() {
            showPassword(passwordInput, this);
        });

        const form = document.querySelector('form');
        const userPassword = "{{ $user->password }}"; // Gantilah dengan cara Anda menghash password di sini

        form.addEventListener('submit', function(event) {
            const inputPassword = oldPasswordInput.value; // Password yang diinput oleh pengguna

            // Gunakan CryptoJS untuk menghasilkan hash dari password yang dimasukkan
            const hashedInputPassword = CryptoJS.SHA256(inputPassword).toString();

            if (userPassword && hashedInputPassword !== userPassword) {
                event.preventDefault(); // Mencegah pengiriman formulir
                Swal.fire({
                    icon: 'error',
                    title: 'Password Lama Salah',
                    text: 'Password lama Anda salah.',
                });
            }
        });
    });
</script>

@endsection
