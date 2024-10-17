@extends('layouts.app')

@section('title', 'Data Siswa : ' . $rombel->rombel )

@section('content')


    <!-- Display cards for each student in the Rombel -->
    <div class="row">
        @if ($rombel->siswas->isEmpty())
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    Tidak ada siswa di rombel ini.
                </div>
            </div>
        @else
            @foreach ($rombel->siswas as $siswa)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            @if ($siswa->foto)
                                <img src="{{ Storage::url($siswa->foto) }}" alt="{{ $siswa->nama }}" class="card-img-top mb-3"
                                    width="200" height="200" style="max-height: 200px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/200" alt="Foto default" class="card-img-top mb-3"
                                    style="max-height: 200px; object-fit: cover;">
                            @endif
                            <h5 class="card-title">{{ $siswa->nama }}</h5>
                            <p class="card-text">
                                <strong>NIS:</strong> {{ $siswa->nis }} <br>
                                <strong>Email:</strong> {{ $siswa->email }} <br>
                                <strong>Rayon:</strong> {{ $siswa->rayon }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Button to open the modal for adding students -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSiswaModal">
        Tambah Siswa
    </button>

    <!-- Modal for adding students -->
    <div class="modal fade" id="addSiswaModal" tabindex="-1" aria-labelledby="addSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('rombel.add-siswa', $rombel->id) }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSiswaModalLabel">Tambah Siswa ke Rombel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="siswas">Pilih Siswa:</label>
                            <select name="siswas[]" id="siswas" class="form-control" multiple>
                                @foreach ($siswas as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }} (NIS: {{ $siswa->nis }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-success">Tambah Siswa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
