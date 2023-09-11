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
</script>
<div class="card">
    <div class="card-body d-flex align-items-center">
        <h4 class="card-title" style="margin-right: auto;">Token WhatsApp</h4>
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Token</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($data as $token)
                     <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $token->token }}</td>
                        <td>
                            <div class="btn-group" >
                                <a href="/ubah_token/{{ $token->id }}" class="btn btn-success btn-sm mr-1" style="font-size: 15px; margin-right: 20px; border-radius:5px ">Ganti Token</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
