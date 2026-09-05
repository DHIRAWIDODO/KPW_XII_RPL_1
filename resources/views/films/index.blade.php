@extends('layouts.app')

@section('title', 'Films')
@section('page-title', 'Films')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Films</li>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">All Films</h4>
        <a href="{{ route('film.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Film
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @forelse ($films as $film)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $film->poster) }}" class="card-img-top"
                         style="height: 280px; object-fit: cover;" alt="{{ $film->judul }}">
                    <div class="card-body">
                        <h5 class="card-title mb-1">
                            {{ $film->judul }} <small class="text-muted">({{ $film->tahun }})</small>
                        </h5>
                        <span class="badge text-bg-primary mb-2">{{ $film->genre->nama }}</span>
                        <p class="card-text small text-truncate">{{ $film->ringkasan }}</p>
                        <p class="mb-0">
                            @php($avg = round($film->kritiks->avg('point'), 1))
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="bi {{ $i <= round($avg) ? 'bi-star-fill text-warning' : 'bi-star text-muted' }}"></i>
                            @endfor
                            <span class="text-muted small">({{ $avg ?: 'Belum ada rating' }})</span>
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('film.show', $film) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                        <a href="{{ route('film.edit', $film) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('film.destroy', $film) }}" method="POST"
                              onsubmit="return confirm('Hapus film ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center text-secondary py-5">
                        Belum ada film. Klik "Add Film" untuk menambahkan.
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection