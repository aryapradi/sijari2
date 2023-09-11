@extends('layout.main')


@section('content') 


<div class="container border rounded p-5" style="background-color:#ffffff">
    <h4 class="card-title mb-4" >Form Koordinator</h4>
    <form action="/update_koordinator/{{ $data->id }}" method="POST">
        @csrf
        {{-- <div class="form-group mb-3">
            <label for="id" class="text-dark">ID</label>
            <input type="text" class="form-control" id="id"  name="id"  placeholder="Enter ID">
        </div> --}}

        <div class="form-group mb-3">
            <label for="nama" class="text-dark">Nama</label>
            <input type="text" class="form-control" id="nama_koordinator" name="nama_koordinator" value="{{ $data->nama_koordinator }}">
        </div>

        <div class="form-group mb-3">
            <label for="username" class="text-dark">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $data->username }}">
        </div>

        <div class="form-group mb-3">
            <label for="nama" class="text-dark">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ $data->password }}">
        </div>
        
        <div class="form-group mb-3">
            <label for="">Provinsi</label>
            <select class="form-control"  name="provinsi" id="provinceDropdown" >
            <option value="{{ $data->provinces->id }}" >{{ $data->provinces->name }}</option>
            @foreach ($provinsis as $prov)
            <option value="{{ $prov->id }}">{{ $prov->name }}</option>
            @endforeach
           </select>
        </div>

        <div class="form-group mb-3">
            <label for="">Kabupaten/Kota</label>
            <select class="form-control" name="kabupaten" id="regencyDropdown" >
            <option value="{{ $data->regencies->id }}">{{ $data->regencies->name }}</option>
            @foreach ($regencies as $kab)
            <option value="{{$kab->id}}">{{$kab->name}}</option>
            @endforeach
           </select>
        </div>

        <div class="form-group mb-3">
            <label for="">Kecamatan</label>
            <select class="form-control" name="kecamatan" id="districtDropdown"  >
            <option value="{{ $data->districts->id }}">{{ $data->districts->name }}</option>
            @foreach ($districts as $kec)
            <option value="{{$kec->id}}">{{$kec->name}}</option>
            @endforeach
           </select>
        </div>   
        
        <div class="form-group mb-3">
            <label for="">kelurahan</label>
            <select class="form-control" name="kelurahan" id="villageDropdown">
            <option value="{{ $data->villages->id }}">{{ $data->villages->name }}</option>
            @foreach ($villages as $des)
            <option value="{{$des->id}}">{{$des->name}}</option>
            @endforeach
           </select>
        </div>     

        <div class="form-group mb-3">
            <label for="">Caleg</label>
            <select class="form-control" name="caleg_id" id="caleg_id" >
            <option value="{{ $data->caleg_id}}" >{{$data->caleg->nama_caleg}}</option>
            </select>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-secondary ml-auto" href="/DataKoor">Cancel</a>
            <button type="submit"class="btn btn-primary ml-auto">Submit</button>
        </div>
    </form>
</div>

<!-- Load jQuery dan Script AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#provinceDropdown').change(function () {
        var selectedProvince = $(this).val();

        $.ajax({
            url: '/store/store_koordinator/get-locations',
            type: 'GET',
            data: { province: selectedProvince },
            success: function (data) {
                  // Isi dropdown kabupaten
                  var regencyOptions = '';
                data.regencies.forEach(function (regency) {
                    regencyOptions += '<option value="' + regency.id + '">' + regency.name + '</option>';
                });
                $('#regencyDropdown').html(regencyOptions);
                
                // Reset dropdown kecamatan dan desa
                $('#districtDropdown').html('');
                $('#villageDropdown').html('');
            }
        });
    });

    $('#regencyDropdown').change(function () {
        var selectedRegency = $(this).val();

        $.ajax({
            url: '/store/store_koordinator/get-locations',
            type: 'GET',
            data: { regency: selectedRegency },
            success: function (data) {
                // Isi dropdown kecamatan
                var districtOptions = '';
                data.districts.forEach(function (district) {
                    districtOptions += '<option value="' + district.id + '">' + district.name + '</option>';
                });
                $('#districtDropdown').html(districtOptions);
                
                // Reset dropdown desa
                $('#villageDropdown').html('');
            }
        });
    });

    $('#districtDropdown').change(function () {
        var selectedDistrict = $(this).val();

        $.ajax({
            url: '/store/store_koordinator/get-locations',
            type: 'GET',
            data: { district: selectedDistrict },
            success: function (data) {
                // Isi dropdown desa
                var villageOptions = '';
                data.villages.forEach(function (village) {
                    villageOptions += '<option value="' + village.id + '">' + village.name + '</option>';
                });
                $('#villageDropdown').html(villageOptions);
            }
        });
    });


</script>


@endsection