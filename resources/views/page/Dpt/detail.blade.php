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
                    <th>Nama:</th>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <th>NO KK:</th>
                    <td>{{ $data->no_kk }}</td>
                </tr>
                <tr>
                    <th>NIK:</th>
                    <td>{{ $data->nik }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir:</th>
                    <td>{{ $data->tempat_lahir }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir:</th>
                    <td>{{ $data->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th>Status Perkawinan:</th>
                    <td>{{ $data->status_perkawinan }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin:</th>
                    <td>{{ $data->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Jalan:</th>
                    <td>{{ $data->jalan }}</td>
                </tr>
                <tr>
                    <th>RT:</th>
                    <td>{{ $data->rt }}</td>
                </tr>
                <tr>
                    <th>RW:</th>
                    <td>{{ $data->rw }}</td>
                </tr>
                <tr>
                    <th>Disabilitas:</th>
                    <td>{{ $data->disabilitas }}</td>
                </tr>
                <tr>
                    <th>Kota:</th>
                    <td>{{ $data->kota }}</td>
                </tr>
                <tr>
                    <th>Kelurahan:</th>
                    <td>{{ $data->kelurahan }}</td>
                </tr>
                <tr>
                    <th>Kecamatan:</th>
                    <td>{{ $data->kecamatan }}</td>
                </tr>
                <tr>
                    <th>TPS:</th>
                    <td>{{ $data->tps }}</td>
                </tr>
                <tr>
                    <th>No Telepon:</th>
                    <td>{{ $data->NoTlpn }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary mt-2 ml-3" href="{{ route('dpt') }}">KEMBALI</a>
        </div>
    </div>
</div>

@endsection
