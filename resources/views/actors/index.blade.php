@extends('layouts.app')

@section('title', 'Actor')
@section('page-title', 'Actor')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Actor</li>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">All Actor</h4>
        <a href="{{ route('actor.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Actor
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-3">Nama Peran</th>
                        <th>Film</th>
                        <th>Aktor</th>
                        <th class="text-end pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($actors as $actor)
                        <tr>
                            <td class="ps-3">{{ $actor->nama }}</td>
                            <td>{{ $actor->film->judul ?? '-' }}</td>
                            <td>{{ $actor->cast->nama ?? '-' }}</td>
                            <td class="text-end pe-3">
                                <a href="{{ route('actor.show', $actor) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                                <a href="{{ route('actor.edit', $actor) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('actor.destroy', $actor) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Hapus peran ini?')">
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
                                Belum ada peran. Klik "Add Actor" untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection