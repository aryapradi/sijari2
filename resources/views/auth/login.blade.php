<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Grevot Login</title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Remove or comment out the background image style below -->
        <!-- ============================================================== -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" height="">
            <path fill="#FF0000" fill-opacity="1"
                d="M0,128L40,138.7C80,149,160,171,240,181.3C320,192,400,192,480,165.3C560,139,640,85,720,74.7C800,64,880,96,960,122.7C1040,149,1120,171,1200,165.3C1280,160,1360,128,1400,112L1440,96L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
            </path>
        </svg>
        <div class="text-center">
            {{-- <img src="../assets/images/big/icon.png" alt="wrapkit"> --}}
        </div>
        <div class="container" style="background-color: white; padding: 20px; border-radius: 10px;">
            <h2 class="mt-3 text-center" style="color: black;">Login</h2>
            <p class="text-center" style="color: black;">Selamat Datang Di Relawan Pemilu</p>

            <!-- Display a success message if the user has successfully logged in -->
            @if(session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
            @endif

            <form class="mt-4" method="POST" action="{{ route('postlogin') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label text-dark" for="email" style="margin-left: 20px;">email</label>
                    <input class="form-control" id="email" type="text"
                        style="border-radius: 25px; height: 50px; width: 100%;" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label class="form-label text-dark" for="pwd" style="margin-top: 20px; margin-left: 20px;">Password</label>
                    <input class="form-control" id="password" type="password"
                        style="border-radius: 25px; height: 50px; width: 100%;" name="password" required
                        autocomplete="current-password" placeholder="Masukkan Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" style="border-radius: 5px; width: 100%; height: 50px; background-color: #FF0000; color: white; border: none;">Masuk</button>
                </div>
                <div class="text-center mt-5">
                    Belum Punya Akun ? <a href="{{ __('register') }}" class="text-dark">Daftar</a>
                </div>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader").fadeOut();
    </script>
    </html>

    
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        .login-container {
            max-width: 300px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="/postlogin" method="post">
            @csrf
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html> --}}
