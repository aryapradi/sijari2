@extends('layout.main')

@section('content')

<div class="content">
    <div class="card">
        <div class="card-header">
            <h4>Detail Data DPT</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="font-size:12px">Email:</th>
                        <td style="font-size: 12px;">{{ $user->email }}</td>
                    </tr>
                    
                    
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-danger " style="border-radius:5px; height:35px; padding-bottom:15px" href="{{ route('user') }}">Kembali</a>
        </div>
    </div>
</div>

@endsection
