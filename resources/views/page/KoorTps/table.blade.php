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
                <h4 class="card-title">Data Koordinator TPS</h4>
                <div class="btn-group mb-3">
                    <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle"
                        style="width: 100px; border-radius:5px" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Aksi
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/create_koortps">Input Manual</a>
                        <a class="dropdown-item" href="/export_dpt">Export</a>
                        <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Import</a>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteAllDataModal">Delete All Data</button>
                    </div>
                    
                </div>
                <div class="table-responsive">  
                    <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Badrul</td>
                                <td>Boss</td>
                                <td>Di Sini</td>
                                <td>20 Tahun</td>
                                <td>Now</td>
                                <td>Mahal</td>
                            </tr>
                        <tfoot>
                            
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import Caleg Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="/import_dpt" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control" type="file" name="file" required>
                    </div>
                    <div class="modal-footer">
                        <a href="/download_Template" class="btn btn-primary">Unduh Template Excel</a>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete All Data Modal -->
    <div class="modal fade" id="deleteAllDataModal" tabindex="-1" aria-labelledby="deleteAllDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAllDataModalLabel">Delete All Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/delete_all_data" method="GET">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Anda Yakin Ingin Menghapus Semua Data Dpt ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>









@endsection