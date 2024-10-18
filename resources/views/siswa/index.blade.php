@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
    {{-- <div class="row mb-4">
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
    </div> --}}

    <div class="d-flex justify-content-end mb-3">
        <form class="d-flex align-items-center" role="search">
            <input class="form-control me-2" type="search" placeholder="Cari Siswa" aria-label="Search" name="search_siswa"
                style="border-radius: 30px;">
            <button class="btn btn-outline-primary w-100" type="submit" style="border-radius: 30px;">
                <i class="fas fa-search"></i> Cari
            </button>
        </form>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover table-bordered border-primary text-center align-middle">
        <thead class="table-light border-primary">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Rombel</th>
                <th>Rayon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($siswas->isEmpty())
                <tr>
                    <td colspan="8" class="text-center">Data Siswa Kosong</td>
                </tr>
            @else
                @foreach ($siswas as $index => $siswa)
                    <tr>
                        <td>{{ ($siswas->currentPage() - 1) * $siswas->perPage() + ($index + 1) }}</td>
                        <td>
                            @if ($siswa->foto)
                                <img src="{{ Storage::url($siswa->foto) }}" alt="Foto Siswa" width="50" height="50"
                                    style="object-fit: cover">
                            @else
                                <img src="https://via.placeholder.com/50" alt="Foto default" width="50" height="50"
                                    style="object-fit: cover">
                            @endif
                        </td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->email }}</td>
                        <td>{{ $siswa->rombel }}</td>
                        <td>{{ $siswa->rayon }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#previewModal{{ $siswa->id }}">
                                <i class="fas fa-eye"></i>
                            </button>
                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-sm"
                                onclick="showModal('{{ $siswa['id'] }}' , '{{ $siswa['nama'] }}')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal for Preview -->
                    <div class="modal fade" id="previewModal{{ $siswa->id }}" tabindex="-1"
                        aria-labelledby="previewModalLabel{{ $siswa->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content shadow">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="previewModalLabel{{ $siswa->id }}">Data Siswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex">
                                    <div class="w-50">
                                        <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
                                        <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
                                        <p><strong>Email:</strong> {{ $siswa->email }}</p>
                                        <p><strong>Rombel:</strong> {{ $siswa->rombel }}</p>
                                        <p><strong>Rayon:</strong> {{ $siswa->rayon }}</p>
                                    </div>
                                    <div class="w-50 text-center">
                                        @if ($siswa->foto)
                                            <img src="{{ Storage::url($siswa->foto) }}" alt="Foto Siswa" width="200"
                                                height="200" class="shadow-sm" style="object-fit: cover">
                                        @else
                                            <div class="bg-light d-flex justify-content-center align-items-center"
                                                style="width: 200px; height: 200px; object-fit: cover;">
                                                <p>No Photo Available</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </tbody>
    </table>

    <!-- Delete Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="form-delete-siswa" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data siswa <span id="nama-siswa"></span>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-danger" id="confirm-delete">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Data Siswa</a>
        {{ $siswas->links() }}
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        function showModal(id, nama) {
            let urlDelete = "{{ route('siswa.delete', ':id') }}";
            urlDelete = urlDelete.replace(':id', id);
            $('#form-delete-siswa').attr('action', urlDelete);
            $('#exampleModal').modal('show');
            $('#nama-siswa').text(nama);
        }
    </script>
@endpush
