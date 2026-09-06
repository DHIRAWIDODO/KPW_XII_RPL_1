@extends('layouts.app')

@section('title', 'Edit Cast')
@section('page-title', 'Edit Cast')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('cast.index') }}">Cast</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cast.update', $cast) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" maxlength="45" required value="{{ old('nama', $cast->nama) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Umur</label>
                    <input type="number" name="umur" class="form-control" required value="{{ old('umur', $cast->umur) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control" rows="4" required>{{ old('bio', $cast->bio) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('cast.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection