@extends('layout.main')

@section('content')
<div class="container">
    <h2>Unggah Foto Pemilih</h2>

    @if ($pemilih->status == 'valid')
        <p>Status: Valid</p>
    @else
        <p>Status: Tidak Valid</p>
    @endif

    <form action="{{ route('unggah_foto.unggah', ['id' => $pemilih->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="foto">Unggah Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*" onchange="previewImage(this);">
        </div>

        <!-- Menambahkan elemen gambar untuk pratinjau -->
<div class="form-group">
    <img id="preview" src="{{ asset('placeholder.jpg') }}" alt="Preview" style="max-width: 200px; max-height: 200px;">
</div>


        <button type="submit" class="btn btn-primary">Unggah</button>
    <a class="btn btn-secondary ml-auto" href="/DataPemilih" >Cancel</a>
        
    </form>
</div>

<!-- Script JavaScript untuk pratinjau gambar -->
<script>
    function previewImage(input) {
        var preview = document.getElementById('preview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
