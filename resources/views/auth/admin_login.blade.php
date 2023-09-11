<!DOCTYPE html>
<html dir="ltr">

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
            <!-- Login box.scss -->
            <!-- ============================================================== -->
            <!-- Remove or comment out the background image style below -->
            <!-- <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
                style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;"> -->
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative">
                <div class="auth-box row" style="width:500px; border-radius:5px">
                    <div class="col-lg-7 col-md-5 modal-bg-img"
                        style="background-image: url(../assets/images/big/Depok.png); width:100%">
                    </div>
                    <div class="col-lg-5 col-md-7 bg-white" style="width:500px ">
                        <div class="p-3">
                            <div class="text-center">
                                {{-- <img src="../assets/images/big/icon.png" alt="wrapkit"> --}}
                            </div>
                            <h2 class="mt-3 text-center" style="color:black">Sign In</h2>
                            <p class="text-center" style="color: black">Masukkan Username Anda</p>
                            
                            <!-- Display a success message if the user has successfully logged in -->
                            @if(session('status'))
                                <div class="alert alert-success text-center">
                                    {{ session('status') }}
                                </div>
                            @endif

            <form class="mt-4" method="POST" action="{{ route('postlogin') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label text-dark" for="uname" style="margin-left: 20px;">Email</label>
                    <input class="form-control" id="uname" type="text"
                        style="border-radius: 25px; height: 50px; width: 100%;" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label class="form-label text-dark" for="pwd" style="margin-top: 20px; margin-left: 20px;">Password</label>
                    <input class="form-control" id="pwd" type="password"
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

    