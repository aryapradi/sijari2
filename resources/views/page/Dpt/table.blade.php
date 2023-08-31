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
    
        document.getElementById('delete-all-btn').addEventListener('click', function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete all data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('delete_all_data') }}";
                }
            });
        });
    
    </script>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data DPT</h4>
                    <div class="btn-group mb-3">
                        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" style="width: 100px; border-radius:5px" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                        </button>
                        <div class="dropdown-menu">
                            {{-- <a class="dropdown-item" href="/create_caleg">Tambah Data</a> --}}
                            <a class="dropdown-item" href="/export_dpt">Export</a>
                            <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Import</a>
                            <a class="dropdown-item" href="/delete_all_data" id="delete-all-btn">Delete All Data</a>

                            {{-- <a class="dropdown-item" href="/delete_all_data" id="delete-all-btn">Delete All Data</a> --}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="default_order" class="table border table-striped table-bordered text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>KECAMATAN</th>
                                    <th>KELURAHAN</th>
                                    <th>TPS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data rows will go here -->

                                @foreach ( $data as $dpt )
                                    <tr>
                                        
                                        <td>{{ $dpt->nama}}</td>
                                        <td>{{ $dpt->kecamatan}}</td>
                                        <td>{{ $dpt->kelurahan}}</td>
                                        <td>{{ $dpt->tps}}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Import Caleg Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/import_dpt" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">                          
                                    <input class="form-control" type="file" name="file">
                        </div>
                        <div class="modal-footer">
                            <a href="/download_Template" class="btn btn-primary">Unduh Template Excel</a>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @endsection
