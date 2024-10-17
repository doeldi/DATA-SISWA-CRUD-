@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="card-body">
                <h1 class="display-4 mb-4">Sistem Informasi Sekolah: Kelola Data Siswa dengan Mudah</h1>
                <p class="lead mb-3">Kelola data siswa dengan mudah dan cepat. Lihat daftar siswa, tambahkan siswa baru, dan banyak lagi dengan hanya beberapa klik.</p>
                <h2 class="mb-4">Fitur</h2>
                <ul>
                    <li>Lihat Daftar Siswa</li>
                    <li>Tambah Siswa Baru</li>
                    <li>Kelola Data Guru</li>
                    <li>Lihat Statistik Sekolah</li>
                </ul>
                <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-list"></i> Lihat Daftar Siswa
                </a>
                <a href="{{ route('siswa.create') }}" class="btn btn-success btn-lg">
                    <i class="fas fa-plus"></i> Tambah Siswa Baru
                </a>
            </div>
        </div>
    </div>
@endsection