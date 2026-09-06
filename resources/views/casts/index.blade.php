@extends('layouts.app')

@section('title', 'Cast')
@section('page-title', 'Cast')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Cast</li>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">All Cast</h4>
        <a href="{{ route('cast.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Cast
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-3">Nama</th>
                        <th>Umur</th>
                        <th>Bio</th>
                        <th class="text-end pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($casts as $cast)
                        <tr>
                            <td class="ps-3">{{ $cast->nama }}</td>
                            <td>{{ $cast->umur }}</td>
                            <td>{{ Str::limit($cast->bio, 60) }}</td>
                            <td class="text-end pe-3">
                                <a href="{{ route('cast.show', $cast) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                                <a href="{{ route('cast.edit', $cast) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('cast.destroy', $cast) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Hapus cast ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-secondary py-5">
                                Belum ada cast. Klik "Add Cast" untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection