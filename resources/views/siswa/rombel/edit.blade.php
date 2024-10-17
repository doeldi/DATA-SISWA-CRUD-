@extends('layouts.app')

@section('title', 'Edit Rombel')

@section('content')
    <form action="{{ route('rombel.update', $rombel->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group mb-3">
            <label for="rombel">Rombel:</label>
            <input type="text" class="form-control" id="rombel" name="rombel" value="{{ $rombel->rombel }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
