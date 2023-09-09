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
                        <th>Nama:</th>
                        <td>{{ $dpt->nama }}</td>
                    </tr>
                    <tr>
                        <th>NO KK:</th>
                        <td>{{ $dpt->no_kk }}</td>
                    </tr>
                    <tr>
                        <th>NIK:</th>
                        <td>{{ $dpt->nik }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir:</th>
                        <td>{{ $dpt->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir:</th>
                        <td>{{ $dpt->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Status Perkawinan:</th>
                        <td>{{ $dpt->status_perkawinan }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin:</th>
                        <td>{{ $dpt->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Jalan:</th>
                        <td>{{ $dpt->jalan }}</td>
                    </tr>
                    <tr>
                        <th>RT:</th>
                        <td>{{ $dpt->rt }}</td>
                    </tr>
                    <tr>
                        <th>RW:</th>
                        <td>{{ $dpt->rw }}</td>
                    </tr>
                    <tr>
                        <th>Disabilitas:</th>
                        <td>{{ $dpt->disabilitas }}</td>
                    </tr>
                    <tr>
                        <th>Kota:</th>
                        <td>{{ $dpt->kota }}</td>
                    </tr>
                    <tr>
                        <th>Kelurahan:</th>
                        <td>{{ $dpt->kelurahan }}</td>
                    </tr>
                    <tr>
                        <th>Kecamatan:</th>
                        <td>{{ $dpt->kecamatan }}</td>
                    </tr>
                    <tr>
                        <th>TPS:</th>
                        <td>{{ $dpt->tps }}</td>
                    </tr>
                    <tr>
                        <th>No Telepon:</th>
                        <td>{{ $dpt->NoTlpn }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary mt-2 ml-3" href="{{ route('dpt') }}">KEMBALI</a>
        </div>
    </div>
</div>

@endsection
