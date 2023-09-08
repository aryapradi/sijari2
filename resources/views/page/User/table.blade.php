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
    
    <a href="/create_user" class="btn btn-danger btn-sm" style="border-radius: 5px; margin-bottom:20px; box-shadow: 0 4px 8px rgba(202, 18, 18, 0.912);">Tambah Data User</a>
    

    
    
    @foreach ($data as $user)
        <div class="card" style="background-color: #F5F5F5; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <div class="circular-div" style="color: black">{{ $loop->index + 1 }}</div>
                            </td>
                            <td>
                                <div class="user-info" style="font-size: 16px; margin-top:10px; color: black">
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
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

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
