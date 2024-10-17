@extends('layouts.app')

@section('title', 'Data Rombel')

@section('content')

    <a href="{{ route('rombel.create') }}" class="btn btn-primary mb-3">Tambah Data Rombel</a>

    <div class="row">
        @if ($rombels->isEmpty())
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    Tidak ada data rombel
                </div>
            </div>
        @endif
        @foreach ($rombels as $rombel)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $rombel->rombel }}</h5>
                        <p class="card-text">Jumlah Siswa: {{ $rombel->siswas_count }}</p>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('rombel.show', $rombel->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a href="{{ route('rombel.edit', $rombel->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button" class="btn btn-sm btn-danger"
                                onclick="showModal('{{ $rombel->id }}', '{{ $rombel->rombel }}')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST" id="deleteForm" class="d-inline">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Rombel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data siswa rombel <span id="nama-rombel"></span>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-danger" id="confirm-delete">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        function showModal(id, rombel) {
            let urlDelete = "{{ route('rombel.delete', ':id') }}";
            urlDelete = urlDelete.replace(':id', id);
            $('#deleteForm').attr('action', urlDelete);
            $('#nama-rombel').text(rombel);
            $('#exampleModal').modal('show');
        }
    </script>
@endpush
