@extends('layouts.app')

@section('title', 'Edit Data Siswa')

@section('content')
    <div class="card-body">
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH') 
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nis" class="form-label">NIS:</label>
                    <input type="text" id="nis" name="nis"
                        class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis', $siswa->nis) }}"
                        required>
                    @error('nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" id="nama" name="nama"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $siswa->nama) }}"
                        required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $siswa->email) }}"
                        required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" id="foto" name="foto"
                        class="form-control @error('foto') is-invalid @enderror" onchange="previewImage(this);">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <img id="preview" src="{{ $siswa->foto ? Storage::url($siswa->foto) : '' }}" alt="Foto Siswa" width="100" class="mt-2" style="{{ $siswa->foto ? '' : 'display: none;' }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="rombel" class="form-label">Rombel:</label>
                    <input type="text" id="rombel" name="rombel"
                        class="form-control @error('rombel') is-invalid @enderror"
                        value="{{ old('rombel', $siswa->rombel) }}" required>
                    @error('rombel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="rayon" class="form-label">Rayon:</label>
                    <input type="text" id="rayon" name="rayon"
                        class="form-control @error('rayon') is-invalid @enderror" value="{{ old('rayon', $siswa->rayon) }}"
                        required>
                    @error('rayon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="text-start">
                <button type="submit" class="btn btn-primary btn-lg">Update Siswa</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>
@endsection
