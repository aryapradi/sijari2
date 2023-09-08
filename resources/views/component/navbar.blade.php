<nav class="navbar top-navbar navbar-expand-lg">
    <div class="navbar-header" data-logobg="skin6">
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                class="ti-menu ti-close"></i></a>
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-brand">
            <!-- Logo icon -->
            <a href="index.html">
                <img src="../assets/images/freedashDark.svg" alt="" class="img-fluid">
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Toggle which is visible on mobile only -->
        <!-- ============================================================== -->
        <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                class="ti-more"></i></a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-left me-auto ms-3 ps-1">
            <!-- Notification -->
           
            <!-- End Notification -->
            <!-- ============================================================== -->
            <!-- create new -->
            <!-- ============================================================== -->
        </ul>
        <!-- ============================================================== -->
        <!-- Right side toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-end">
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            {{-- <li class="nav-item d-none d-md-block">
                <a class="nav-link" href="javascript:void(0)">
                    <form>
                        <div class="customize-input">
                            <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                type="search" placeholder="Search" aria-label="Search">
                            <i class="form-control-icon" data-feather="search"></i>
                        </div>
                    </form>
                </a>
            </li> --}}
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="../assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"
                        width="40">
                    <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span> 
                     @if( Str::length(Auth::guard('koordinator')->user())>0)
                     <a href="#">{{ Auth::guard('koordinator')->user()->username }}</a>
                     @elseif( Str::length(Auth::guard('saksi')->user())>0)
                    <a href="#">{{ Auth::guard('saksi')->user()->username }}</a>
                     @endif
                    <span
                            class="text-dark"></span> <i data-feather="chevron-down"
                            class="svg-icon"></i></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                    <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                            class="svg-icon me-2 ms-1"></i>
                        My Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0)" onclick="confirmLogout()" class="dropdown-item">
                        <i data-feather="power" class="svg-icon me-2 ms-1"></i> Logout
                    </a>
                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    
                    <script>
                        function confirmLogout() {
                            var username = "{{ Auth::user()->name }}"; // Ambil nama pengguna dari Blade template
                    
                            Swal.fire({
                                title: 'Konfirmasi Logout',
                                text: 'Anda yakin ingin logout sebagai ' + username + '?', // Tambahkan nama pengguna ke dalam pesan
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Ya, Logout',
                                cancelButtonText: 'Batal',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById('logout-form').submit();
                                }
                            });
                        }
                    </script>
                     --}}
                    
                    
                </div>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
        </ul>
    </div>
</nav>