<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Grevot Register</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link rel="stylesheet" href="../dist/css/style.min.css">
    <style>
        /* Your custom styles here */

        body {
            background-color: #fcfcfc;
        }

        .main-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .auth-box {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 700px;
            max-width: 90%;
            margin: 0 auto;
            border-radius: 10px;
        }

        .auth-box h2 {
            font-size: 24px;
            margin-top: 0;
            color: #000000;
        }

        .auth-box p {
            color: #000000;
        }

        .auth-box .form-group {
            margin-bottom: 15px;
        }

        .auth-box label {
            font-weight: bold;
        }

        .auth-box .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .auth-box .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Add your custom login form styles here */
        .auth-box form .form-group {
            margin-bottom: 20px;
        }

        
        .auth-box form label {
            font-weight: bold;
        }

        .auth-box form .btn-primary {
            background-color: #2691d9;
            border: none;
        }

        .auth-box form .btn-primary:hover {
            background-color: #1c74c6;
        }

        /* Add animation for input fields */
        .auth-box form .form-group input {
            transition: border-color 0.3s ease-in-out;
        }

        .auth-box form .form-group input:focus {
            border-color: #2691d9;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="auth-box">
            <div class="text-center">
                {{-- <img src="../assets/images/big/icon.png" alt="wrapkit"> --}}
                {{-- nanti ganti aja foto nya  --}}
                <!-- Your logo or image here -->
            </div>
            <h2 class="mt-3 text-center">Daftar</h2>
            <p class="text-center">Silakan isi formulir pendaftaran.</p>
            <form class="mt-4" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label text-dark" for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label text-dark" for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label text-dark" for="role">{{ __('Role') }}</label>
                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Super Admin</option>
                        <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Admin</option>
                        <option value="3" {{ old('role') == '3' ? 'selected' : '' }}>Bebas</option>
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
                <div class="form-group">
                    <label class="form-label text-dark" for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn w-100 btn-primary" style="border-radius: 5px">{{ __('Daftar') }}</button>
                </div>
                <div class="text-center mt-4">
                    Sudah Punya Akun ? <a href="{{ route('login') }}" class="text-primary">Masuk</a>
                </div>
            </form>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(".preloader").fadeOut();
    </script>
</body>
</html>



































