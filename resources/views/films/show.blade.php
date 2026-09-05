@extends('layouts.app')

@section('title', $film->judul)
@section('page-title', $film->judul)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('film.index') }}">Films</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $film->judul }}</li>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $film->poster) }}" class="img-fluid rounded shadow-sm" alt="{{ $film->judul }}">
        </div>
        <div class="col-md-8">
            <h3 class="mb-1">{{ $film->judul }} <small class="text-muted">({{ $film->tahun }})</small></h3>
            <span class="badge text-bg-primary mb-2">{{ $film->genre->nama }}</span>
            <p>{{ $film->ringkasan }}</p>

            @if ($film->trailer)
                <div class="mb-3">
                    <h6>Trailer</h6>
                    <video controls class="w-100 rounded" style="max-height: 360px;">
                        <source src="{{ asset('storage/' . $film->trailer) }}">
                        Browser Anda tidak mendukung pemutar video.
                    </video>
                </div>
            @endif

            @php($avg = round($film->kritiks->avg('point'), 1))
            <p>
                @for ($i = 1; $i <= 5; $i++)
                    <i class="bi {{ $i <= round($avg) ? 'bi-star-fill text-warning' : 'bi-star text-muted' }}"></i>
                @endfor
                <span class="text-muted">({{ $avg ?: 'Belum ada rating' }} dari {{ $film->kritiks->count() }} ulasan)</span>
            </p>
        </div>
    </div>

    <hr>

    <h5>Ulasan</h5>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('kritik.store', $film) }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label class="form-label d-block">Rating</label>
                    <div class="star-rating">
                        @for ($i = 5; $i >= 1; $i--)
                            <input type="radio" id="star{{ $i }}" name="point" value="{{ $i }}"
                                   {{ old('point') == $i ? 'checked' : '' }} required>
                            <label for="star{{ $i }}"><i class="bi bi-star-fill"></i></label>
                        @endfor
                    </div>
                    @error('point')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>
                <div class="mb-2">
                    <textarea name="content" rows="2" class="form-control @error('content') is-invalid @enderror"
                              placeholder="Tulis ulasan kamu...">{{ old('content') }}</textarea>
                    @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Kirim Ulasan</button>
            </form>
        </div>
    </div>

    @forelse ($film->kritiks->sortByDesc('created_at') as $kritik)
        <div class="d-flex mb-3">
            <div class="me-3">
                <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center"
                      style="width: 40px; height: 40px;">
                    {{ strtoupper(substr($kritik->user->name, 0, 1)) }}
                </span>
            </div>
            <div>
                <strong>{{ $kritik->user->name }}</strong>
                <div>
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="bi {{ $i <= $kritik->point ? 'bi-star-fill text-warning' : 'bi-star text-muted' }}" style="font-size: 0.8rem;"></i>
                    @endfor
                </div>
                <p class="mb-0">{{ $kritik->content }}</p>
                <small class="text-muted">{{ $kritik->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @empty
        <p class="text-muted">Belum ada ulasan untuk film ini.</p>
    @endforelse
@endsection

@push('styles')
    <style>
        .star-rating {
            display: inline-flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            cursor: pointer;
            font-size: 1.5rem;
            color: #ccc;
            padding: 0 2px;
        }
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffc107;
        }
    </style>
@endpush