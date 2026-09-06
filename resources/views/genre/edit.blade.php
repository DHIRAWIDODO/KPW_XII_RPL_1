@extends('layouts.app')

@section('title', 'Edit Genre')
@section('page-title', 'Edit Genre')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('genre.index') }}">Genre</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Genre</h3>
        </div>
        <form action="{{ route('genre.update', $genre) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Name</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $genre->nama) }}"
                           class="form-control @error('nama') is-invalid @enderror" required minlength="5">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('genre.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection