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
    
    

    <a href="/create_user" class="btn btn-danger btn-sm" style="border-radius: 5px; margin-bottom:10px">Tambah Data User</a>
    

    <div class="card">
        <div class="table-responsive">
            <table class="table" style="background-color: #61677A; border-radius:10px">
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($data as $user)
                        <tr>
                            <td>
                                <div class="circular-div" style="color: #F9F9F9">{{ $no++ }}</div>
                            </td>
                            <td>
                                <div class="user-info" style="font-size: 16px; color: #F9F9F9">
                                    <div>{{ $user->name }}</div>
                                    <div class="role-separator"></div> <!-- Horizontal line -->
                                    <div style="font-size: 12px; color:#000000">
                                        @if($user->role == 1)
                                            Super Admin
                                        @elseif($user->role == 2)
                                            Admin
                                        @elseif($user->role == 3)
                                            Fasilitator
                                        @elseif($user->role == 4)
                                            Koordinator
                                        @else
                                            Unknown Role
                                        @endif
                                    </div>
                                </div>
                            </td>
                            
                            <td>
                                <div class="btn-group-vertical" role="group">
                                    <a href="{{ route('detail_user', ['id' => $user->id]) }}" class="btn btn-secondary btn-sm" style="border-radius: 5px; margin-bottom:10px; color:#ffff">Detail</a>
                                    <a href="{{ route('edit_user', ['id' => $user->id]) }}" class="btn btn-secondary btn-sm" style="border-radius: 5px; margin-bottom:10px; color:white">Edit</a>
                                    <form action="{{ route('hapus_user', ['id' => $user->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 5px">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <style>
        .role-separator {
            border-top: 1px solid #e51414;
            margin: 5px 0;
            width: 100%; /* Adjust the width to your desired value */
        }

        .btn-container {
            margin-bottom: 20px; /* Adjust the margin as needed */
        }
    </style>
    
@endsection
