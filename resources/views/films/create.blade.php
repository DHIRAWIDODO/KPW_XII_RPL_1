@extends('layouts.app')

@section('title', 'Add Film')
@section('page-title', 'Add Film')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('film.index') }}">Films</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul Film</label>
                    <input type="text" name="judul" value="{{ old('judul') }}"
                           class="form-control @error('judul') is-invalid @enderror">
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Genre</label>
                        <select name="genre_id" id="genre_id" class="form-select @error('genre_id') is-invalid @enderror">
                            <option value="">-- Pilih Genre --</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                                    {{ $genre->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('genre_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tahun Rilis</label>
                        <input type="number" name="tahun" value="{{ old('tahun') }}"
                               class="form-control @error('tahun') is-invalid @enderror">
                        @error('tahun')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ringkasan / Deskripsi</label>
                    <textarea name="ringkasan" rows="4"
                              class="form-control @error('ringkasan') is-invalid @enderror">{{ old('ringkasan') }}</textarea>
                    @error('ringkasan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Poster (gambar)</label>
                        <input type="file" name="poster" accept="image/*"
                               class="form-control @error('poster') is-invalid @enderror">
                        @error('poster')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Cuplikan / Trailer (video, opsional)</label>
                        <input type="file" name="trailer" accept="video/*"
                               class="form-control @error('trailer') is-invalid @enderror">
                        @error('trailer')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Film</button>
                <a href="{{ route('film.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" crossorigin="anonymous">
    <style>
        .choices__inner {
            background-color: var(--bs-body-bg) !important;
            color: var(--bs-body-color) !important;
            border-color: var(--bs-border-color) !important;
        }
        .choices__list--dropdown,
        .choices__list--dropdown .choices__item {
            background-color: var(--bs-body-bg) !important;
            color: var(--bs-body-color) !important;
            border-color: var(--bs-border-color) !important;
        }
        .choices__list--dropdown .choices__item--selectable.is-highlighted {
            background-color: var(--bs-tertiary-bg) !important;
        }
        .choices__input {
            background-color: transparent !important;
            color: var(--bs-body-color) !important;
        }
        .choices__placeholder {
            color: var(--bs-secondary-color) !important;
            opacity: 1 !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Choices('#genre_id', {
                searchEnabled: true,
                itemSelectText: '',
                shouldSort: false,
                placeholder: true,
                placeholderValue: '-- Pilih atau ketik Genre --',
            });
        });
    </script>
@endpush