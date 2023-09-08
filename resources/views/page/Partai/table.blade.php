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
    
    {{-- <a href="{{ route('create_partai') }}" class="btn btn-danger btn-sm" style="border-radius: 5px; box-shadow: 0 4px 8px rgba(202, 18, 18, 0.912); margin-bottom: 20px">Tambah Partai</a> --}}
    
    @if (count($data) === 0)
            <a href="/create_partai"class="btn btn-danger btn-sm" style="border-radius: 5px; box-shadow: 0 4px 8px rgba(202, 18, 18, 0.912); margin-bottom: 20px">Tambah Data</a>
        @else
            <button href="" disabled class="btn btn-danger btn-sm" style="border-radius: 5px; box-shadow: 0 4px 8px rgba(202, 18, 18, 0.912); margin-bootom: 20px">Tambah Data</button>
        @endif



    @foreach ($data as $row)
        <div class="card" style="background-color: #F5F5F5; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <div class="circular-div" style="color: black">{{ $loop->index + 1 }}</div>
                            </td>
                            <td>
                                <div class="user-info" style="font-size: 16px; color: black">
                                    <div>{{ $row->nama_partai }}</div>
                                    <div class="role-separator"></div> <!-- Horizontal line -->
                                </div>
                            </td>
                            <td>
                                <div class="btn-group-vertical" role="group" >
                                    <a href="/edit_partai/{{$row->id}}"class="btn btn-secondary btn-sm" style="border-radius: 5px; margin-bottom:10px; color:white">Edit</a>
                                    @if(count($caleg) === 0)         
                                        <form action="{{ route('hapus_partai', ['id' => $row->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius:5px; margin-top:10px;">Hapus</button>
                                        </form>
                                    @else
                                        <button type="submit" disabled class="btn btn-danger btn-sm" style="border-radius:5px" title="hapus data caleg terlebih dahulu">Hapus</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

    <style>
        .role-separator {
            border-top: 1px solid #e51414;
            margin: 5px 0;
            width: 100%; /* Sesuaikan lebar sesuai kebutuhan Anda */
        }

        .btn-container {
            margin-bottom: 20px; /* Sesuaikan margin sesuai kebutuhan Anda */
        }
    </style>
@endsection
