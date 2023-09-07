@extends('layout.main')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
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

        @media (max-width: 768px) {
            .btn-group.mb-3 {
                text-align: center;
            }

            .btn-group.mb-3 .btn {
                width: 100%;
                margin: 5px 0;
            }

            .btn-group.mb-3 .dropdown-menu {
                text-align: center;
            }
        }
    </style>

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
                                                style="border-radius: 5px" class="btn btn-info btn-sm">Detail</a>
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                style="border-radius: 5px" data-bs-target="#exampleModalSaksi"
                                                data-id="{{ $dptt->id }}" data-nama="{{ $dptt->nama }}">
                                                Saksi
                                            </button>
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
        <!-- Modal content goes here -->
    </div>
    {{-- Modal Add User To Saksi End --}}

    {{-- Modal Import Start --}}
    <!-- Modal content goes here -->
    {{-- Modal Import End --}}

    <!-- Delete All Data Modal -->
    <!-- Modal content goes here -->
</div>

<script>
    $(document).ready(function() {
        // Menangani klik tombol "Saksi"
        $('.btn-success').click(function() {
            // Mengambil data ID dan nama dari atribut data-
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            // Mengisi nilai input tersembunyi dalam modal
            $('#saksiId').val(id);

            var actionUrl = "{{ route('getsaksi') }}"; // URL dasar
            actionUrl = actionUrl.replace('[ID_PENGGUNA]', ''); // Menghapus kunci "id"
            $('#exampleModalSaksi form').attr('action', actionUrl);

            // Mengisi nama dalam elemen modal
            $('#saksiNama').text(nama);
        });

        // Menangani klik tombol "Import"
        $('#import-form').submit(function() {
            // Menampilkan tampilan loading
            $('#import-spinner').show();
        });

        // Menangani selesai import
        $('#import-form').ajaxComplete(function() {
            // Menyembunyikan tampilan loading
            $('#import-spinner').hide();
        });
    });
</script>
@endsection
