@extends('layouts.app')

@section('title', 'Genres')
@section('page-title', 'Genres')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Genre</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">All Genres</h3>
            <a href="{{ route('genre.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Add Genre
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th>Name</th>
                        <th style="width: 160px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($genres ?? [] as $index => $genre)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $genre->nama }}</td>
                            <td>
                                <a href="{{ route('genre.show', $genre) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('genre.edit', $genre) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('genre.destroy', $genre) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this genre?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-secondary py-4">
                                No genres yet. Pass a <code>$genres</code> collection from the controller.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection