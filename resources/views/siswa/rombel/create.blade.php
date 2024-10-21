@extends('layouts.app')

@section('title', 'Tambah Rombel Baru')

@section('content')
    <form action="{{ route('rombel.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="rombel">Rombel:</label>
            <input type="text" class="form-control @error('rombel') is-invalid @enderror" id="rombel"
                name="rombel">
            @error('rombel')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection