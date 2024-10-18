@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="display-4 mb-4 fw-bold">Sistem Informasi Sekolah</h1>
    <p class="lead mb-4">Kelola data siswa dengan mudah dan cepat. Lihat daftar siswa, tambahkan siswa baru, dan
        banyak lagi hanya dengan beberapa klik.</p>

    <div class="row mb-4">
        <!-- Card for showing total number of students -->
        <div class="col-md-3">
            <div class="card bg-primary text-white shadow-sm mb-4" style="border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Siswa</h5>
                    <p class="card-text display-6 fw-bold">{{ \App\Models\Siswa::count() }}</p>
                </div>
                <div class="card-footer">
                    <small>Total siswa yang terdaftar</small>
                </div>
            </div>
        </div>
        <!-- Add more cards if needed -->
        <div class="col-md-3">
            <div class="card bg-warning text-white shadow-sm mb-4" style="border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Kelas</h5>
                    <p class="card-text display-6 fw-bold">{{ \App\Models\Rombel::count() }}</p>
                </div>
                <div class="card-footer">
                    <small>Total kelas yang terdaftar</small>
                </div>
            </div>
        </div>
    </div>

    <div class="d-grid gap-2 d-sm-flex">
        <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-lg me-2 px-4 py-2"
            style="border-radius: 50px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); transition: all 0.3s ease;">
            <i class="fas fa-list"></i> Lihat Daftar Siswa
        </a>
        <a href="{{ route('siswa.create') }}" class="btn btn-success btn-lg px-4 py-2"
            style="border-radius: 50px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); transition: all 0.3s ease;">
            <i class="fas fa-plus"></i> Tambah Siswa Baru
        </a>
    </div>
@endsection
