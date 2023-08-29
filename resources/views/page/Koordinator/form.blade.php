@extends('layout.main')


@section('content') 


<div class="container border rounded p-5" style="background-color:#ffffff">
    <h4 class="card-title mb-4" >Form Koordinator</h4>
    <form action="/store_koordinatoor" method="POST">
        @csrf
        {{-- <div class="form-group mb-3">
            <label for="id" class="text-dark">ID</label>
            <input type="text" class="form-control" id="id"  name="id"  placeholder="Enter ID">
        </div> --}}

        <div class="form-group mb-3">
            <label for="nama" class="text-dark">Nama</label>
            <input type="text" class="form-control" id="nama_koordinator" name="nama_koordinator"  placeholder="Enter Nama">
        </div>

        <div class="form-group mb-3">
            <label for="username" class="text-dark">Username</label>
            <input type="text" class="form-control" id="username" name="username"  placeholder="Enter Username">
        </div>

        <div class="form-group mb-3">
            <label for="nama" class="text-dark">Password</label>
            <input type="password" class="form-control" id="password" name="password"  placeholder="Enter Password">
        </div>
        
        <div class="form-group mb-3">
            <label for="">Provinsi</label>
            <select class="form-control" name="provinsi" id="provinsi"  >
            <option>-- Pilih Profinsi --</option>
            @foreach ($provinsis as $prov)
            <option value="{{$prov->id}}">{{$prov->name}}</option>
            @endforeach
           </select>
        </div>

        <div class="form-group mb-3">
            <label for="">Kabupaten/Kota</label>
            <select class="form-control" name="kabupaten" id="kabuaten"  >
            <option>-- Pilih Kabupaten/Kota --</option>
            @foreach ($kabupatens as $kab)
            <option value="{{$kab->id}}">{{$kab->name}}</option>
            @endforeach
           </select>
        </div>

        <div class="form-group mb-3">
            <label for="">Kecamatan</label>
            <select class="form-control" name="kecamatan" id="kecamatan"  >
            <option>-- Pilih kecamatan --</option>
            @foreach ($kecamatans as $kec)
            <option value="{{$kec->id}}">{{$kec->name}}</option>
            @endforeach
           </select>
        </div>   
        
        <div class="form-group mb-3">
            <label for="">Desa</label>
            <select class="form-control" name="desa" id="desa">
            <option>-- Pilih desa --</option>
            @foreach ($desas as $des)
            <option value="{{$des->id}}">{{$des->name}}</option>
            @endforeach
           </select>
        </div>     

        <div class="form-group mb-3">
            <label for="">Caleg</label>
            <select class="form-control" name="caleg_id" id="caleg_id"  >
            <option>Pilih Caleg</option>
            @foreach ($caleg as $cal)
            <option value="{{$cal->id}}">{{$cal->nama_caleg}}</option>
            @endforeach
           </select>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-secondary ml-auto" href="/DataCaleg">Cancel</a>
            <button type="submit" class="btn btn-primary ml-auto">Submit</button>
        </div>
    </form>
</div>

{{-- <!-- Load jQuery dan Script AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#provinsi').on('change', function() {
        var id_provinsi = $(this).val();

        // Ambil data kabupaten berdasarkan provinsi
        $.get('{{ route("koordinator.get-kabupaten-options", ["id_provinsi" => ""]) }}/' + id_provinsi, function(data) {
            var kabupatenOptions = '<option value="">Pilih Kabupaten/Kota</option>';
            $.each(data, function(index, kabupaten) {
                kabupatenOptions += '<option value="' + kabupaten.id + '">' + kabupaten.nama + '</option>';
            });
            $('#kabupaten').html(kabupatenOptions);
            $('#kecamatan').html('<option value="">Pilih Kecamatan</option>'); // Reset pilihan kecamatan
            $('#desa').html('<option value="">Pilih Desa</option>'); // Reset pilihan desa
        });
    });

    $('#kabupaten').on('change', function() {
        var id_kabupaten = $(this).val();

        // Ambil data kecamatan berdasarkan kabupaten
        $.get('{{ route("koordinator.get-kecamatan-options", ["id_kabupaten" => ""]) }}/' + id_kabupaten, function(data) {
            var kecamatanOptions = '<option value="">Pilih Kecamatan</option>';
            $.each(data, function(index, kecamatan) {
                kecamatanOptions += '<option value="' + kecamatan.id + '">' + kecamatan.nama + '</option>';
            });
            $('#kecamatan').html(kecamatanOptions);
            $('#desa').html('<option value="">Pilih Desa</option>'); // Reset pilihan desa
        });
    });

    $('#kecamatan').on('change', function() {
        var id_kecamatan = $(this).val();

        // Ambil data desa berdasarkan kecamatan
        $.get('{{ route("koordinator.get-desa-options", ["id_kecamatan" => ""]) }}/' + id_kecamatan, function(data) {
            var desaOptions = '<option value="">Pilih Desa</option>';
            $.each(data, function(index, desa) {
                desaOptions += '<option value="' + desa.id + '">' + desa.nama + '</option>';
            });
            $('#desa').html(desaOptions);
        });
    });

    // Ambil data provinsi saat halaman dimuat
    $.get('{{ route("koordinator.get-provinsi-options") }}', function(data) {
        var provinsiOptions = '<option value="">Pilih Provinsi</option>';
        $.each(data, function(index, provinsi) {
            provinsiOptions += '<option value="' + provinsi.id + '">' + provinsi.nama + '</option>';
        });
        $('#provinsi').html(provinsiOptions);
    });
});
</script> --}}



@endsection