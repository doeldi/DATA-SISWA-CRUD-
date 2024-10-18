@extends('layouts.app')

@section('title', 'Tambah Data Siswa')

@section('content')
    <div class="card-body">
        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nis" class="form-label">NIS:</label>
                    <input type="text" id="nis" name="nis"
                        class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis') }}">
                    @error('nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" id="nama" name="nama"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" id="foto" name="foto"
                        class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="rombel" class="form-label">Rombel:</label>
                    <input type="text" id="rombel" name="rombel"
                        class="form-control @error('rombel') is-invalid @enderror" value="{{ old('rombel') }}">
                    @error('rombel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="rayon" class="form-label">Rayon:</label>
                    <input type="text" id="rayon" name="rayon"
                        class="form-control @error('rayon') is-invalid @enderror" value="{{ old('rayon') }}">
                    @error('rayon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="text-start">
                <button type="submit" class="btn btn-primary btn-lg">Tambah Siswa</button>
            </div>
        </form>
    </div>
@endsection
