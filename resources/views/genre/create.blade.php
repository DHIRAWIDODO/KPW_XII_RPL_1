@extends('layouts.app')

@section('title', 'Add Genre')
@section('page-title', 'Add Genre')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('genre.index') }}">Genre</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Genre</h3>
        </div>
        <form action="{{ route('genre.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Name</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                           class="form-control @error('nama') is-invalid @enderror" required minlength="5">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('genre.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection