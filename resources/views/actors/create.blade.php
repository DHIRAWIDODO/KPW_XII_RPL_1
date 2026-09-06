@extends('layouts.app')

@section('title', 'Add Actor')
@section('page-title', 'Add Actor')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('actor.index') }}">Actor</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('actor.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Film</label>
                    <select name="film_id" class="form-select" required>
                        <option value="">-- Pilih Film --</option>
                        @foreach ($films as $film)
                            <option value="{{ $film->id }}" {{ old('film_id') == $film->id ? 'selected' : '' }}>
                                {{ $film->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cast (Aktor)</label>
                    <select name="cast_id" class="form-select" required>
                        <option value="">-- Pilih Cast --</option>
                        @foreach ($casts as $cast)
                            <option value="{{ $cast->id }}" {{ old('cast_id') == $cast->id ? 'selected' : '' }}>
                                {{ $cast->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Peran</label>
                    <input type="text" name="nama" class="form-control" maxlength="45" required value="{{ old('nama') }}">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('actor.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection