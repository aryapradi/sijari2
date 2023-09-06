@extends('layout.main')

@section('content')

<div class="content">
    <div class="card">
        <div class="card-header">
            <h4>Detail Data DPT</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                {{-- <tr>
                    <th>NO KK:</th>
                    <td>{{ $user-> }}</td>
                </tr> --}}
                
            </table>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary mt-2 ml-3" href="{{ route('user') }}" style="border-radius:5px">Back</a>
        </div>
    </div>
</div>

@endsection
