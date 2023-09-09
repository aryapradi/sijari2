@extends('layout.main')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if ($message = Session::get('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ $message }}',
                showConfirmButton: false,
                timer: 5000
            });
        @endif

        @if ($message = Session::get('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ $message }}',
                showConfirmButton: false,
                timer: 5000
            });
        @endif
    </script>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data DPT</h4>
                    <div class="btn-group mb-3">
                        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle"
                            style="width: 100px; border-radius:5px" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Aksi
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/export_dpt">Export</a>
                            <a class="dropdown-item" href="" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Import</a>
                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#deleteAllDataModal">Delete All Data</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="default_order" class="table border table-striped table-bordered text-nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NAMA</th>
                                    <th>KECAMATAN</th>
                                    <th>KELURAHAN</th>
                                    <th>TPS</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dpt as $dptt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dptt->nama }}</td>
                                        <td>{{ $dptt->kecamatan }}</td>
                                        <td>{{ $dptt->kelurahan }}</td>
                                        <td>{{ $dptt->tps }}</td>
                                        <td>
                                            <a href="{{ route('detail_dpt', ['id' => $dptt->id]) }}"
                                                style="border-radius: 5px" class="btn text-white btn-warning btn-sm">Detail</a>
                                            <!-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                style="border-radius: 5px" data-bs-target="#exampleModalSaksi"
                                                data-id="{{ $dptt->id }}" data-nama="{{ $dptt->nama }}">
                                                Saksi
                                            </button>
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            style="border-radius: 5px" data-bs-target="#exampleModalPemilih"
                                            data-id="{{ $dptt->id }}" data-nama="{{ $dptt->nama }}">
                                              Pemilih
                                           </button>                                     -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>     
            </div>
        </div>
    </div>

    {{-- Modal Add User To Saksi Start --}}
    <div class="modal fade" id="exampleModalSaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Koordinator Tps</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menjadikan <span id="nama"></span> sebagai Koordinator Tps?
                </div>
                <form action="{{ route('getsaksi') }}" method="POST">
                    @csrf
                <div class="modal-body">
                    <label for="recipient-name" class="col-form-label">Username</label>
                    <input type="text" class="form-control" id="recipient-name" name="username">
                </div>
                <div class="modal-body">
                    <label for="nama" class="text-dark">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                    <input type="checkbox" id="showPassword"> Show Password
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

                <div class="modal-body">
                    <label for="recipient-name" class="col-form-label">NoTlpn</label>
                    <input type="number" class="form-control" id="recipient-name" name="NoTlpn">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <input type="hidden" id="saksiId" name="saksiId">
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Add User To Saksi End --}}

     {{-- Modal Add User To Pemilih Start --}}
     <div class="modal fade" id="exampleModalPemilih" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Pemilih Potensial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menjadikan <span id="namaPemilih"></span> sebagai Pemilih Potensial?
                </div>
                <form action="{{ route('getpemilih') }}" method="POST">
                    @csrf  
                <div class="modal-body">
                    <label for="recipient-name" class="col-form-label">NoTlpn</label>
                    <input type="number" class="form-control" id="recipient-name" name="NoTlpn">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>  
                        <input type="hidden" id="pemilihId" name="pemilihId">
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Add User To Pemilih End --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Menangani klik tombol "Saksi" dengan event delegation
        $(document).on('click', '.btn-success', function() {
            // Mengambil data ID dan nama dari atribut data-
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            // Mengisi nilai input tersembunyi dalam modal
            $('#saksiId').val(id);

            var actionUrl = "{{ route('getsaksi') }}"; // URL dasar
            actionUrl = actionUrl.replace('[ID_PENGGUNA]', 'id'); // Menghapus kunci "id"
            $('#exampleModalSaksi form').attr('action', actionUrl);

            // Mengisi nama dalam elemen modal
            $('#nama').text(nama);
        });

         // Menangani klik tombol "Pemilih" dengan event delegation
        $(document).on('click', '.btn-info', function() {
        // Mengambil data ID dan nama dari atribut data-
        var id = $(this).data('id');
        var nama = $(this).data('nama');

        // Mengisi nilai input tersembunyi dalam modal Pemilih
        $('#pemilihId').val(id);

        var actionUrl = "{{ route('getpemilih') }}"; // URL dasar
        actionUrl = actionUrl.replace('[ID_PENGGUNA]', ''); // Menghapus kunci "id"
        $('#exampleModalPemilih form').attr('action', actionUrl);

        // Mengisi nama dalam elemen modal Pemilih
        $('#namaPemilih').text(nama);
    });
    </script>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import Caleg Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="import-form" action="/import_dpt" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div id="import-spinner" style="display: none;">
                            <i class="fas fa-spinner fa-spin"></i> Importing...
                        </div>
                        <input class="form-control" type="file" name="file" required>
                    </div>
                    <div class="modal-footer">
                        <a href="/download_Template" class="btn btn-primary">Unduh Template Excel</a>
                        <button type="submit" class="btn btn-primary" id="ImportButton">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete All Data Modal -->
    
</div>

<script>
    function showLoadingSpinner() {
        document.getElementById('import-spinner').style.display = 'block';
        document.getElementById('ImportButton').setAttribute('disabled', 'disabled');
    }
</script>

@endsection