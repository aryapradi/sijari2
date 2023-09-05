@extends('layout.main')


@section('content') 


<div class="container border rounded p-5" style="background-color:#ffffff">
    <h4 class="card-title mb-4" >Form Koordinator</h4>
    <form action="/store/store_koordinator" method="POST">
        @csrf
        {{-- <div class="form-group mb-3">
            <label for="id" class="text-dark">ID</label>
            <input type="text" class="form-control" id="id"  name="id"  placeholder="Enter ID">
        </div> --}}

        <div class="form-group mb-3">
            <label for="nama" class="text-dark">Nama</label>
            <input type="text" class="form-control" id="nama_koordinator" name="nama_koordinator"  placeholder="Enter Nama" required>
            @error('nama_koordiantor')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group mb-3">
            <label for="username" class="text-dark">Username</label>
            <input type="text" class="form-control" id="username" name="username"  placeholder="Enter Username" required>
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group mb-3">
            <label for="nama" class="text-dark">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            <input type="checkbox" id="showPassword"> Show Password
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <script>
            const passwordInput = document.getElementById("password");
            const showPasswordCheckbox = document.getElementById("showPassword");
        
            showPasswordCheckbox.addEventListener("change", function () {
                if (showPasswordCheckbox.checked) {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            });
        </script>
        
        
        <div class="form-group mb-3">
            <label for="">Provinsi</label>
            <select class="form-control" name="provinsi" id="provinceDropdown" required  >
            <option>-- Pilih Provinsi --</option>
            @foreach ($provinsis as $provinceId => $provinceName)
            <option value="{{ $provinceId }}">{{ $provinceName }}</option>
            @endforeach
           </select>
           @error('provinsi')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
        </div>

        <div class="form-group mb-3">
            <label for="">Kabupaten/Kota</label>
            <select class="form-control" name="kabupaten" id="regencyDropdown" required  >
            <option>-- Pilih Kabupaten/Kota --</option>
            @foreach ($kabupatens as $kab)
            <option value="{{$kab->id}}">{{$kab->name}}</option>
            @endforeach
           </select>
        </div>

        <div class="form-group mb-3">
            <label for="">Kecamatan</label>
            <select class="form-control" name="kecamatan" id="districtDropdown" required >
            <option>-- Pilih kecamatan --</option>
            @foreach ($kecamatans as $kec)
            <option value="{{$kec->id}}">{{$kec->name}}</option>
            @endforeach
           </select>
        </div>   
        
        <div class="form-group mb-3">
            <label for="">Desa</label>
            <select class="form-control" name="kelurahan" id="villageDropdown" required>
            <option>-- Pilih desa --</option>
            @foreach ($desas as $des)
            <option value="{{$des->id}}">{{$des->name}}</option>
            @endforeach
           </select>
        </div>     

        <div class="form-group mb-3">
            <label for="">Caleg</label>
            <select class="form-control" disabled  id="partai_id"  >
            <option selected value="">{{$caleg->nama_caleg}}</option>
        </select>
        <input type="hidden" name="caleg_id" value="{{$caleg->id}}">
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