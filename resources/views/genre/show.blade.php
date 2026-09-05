@extends('layouts.app')

@section('title', 'Genre Detail')
@section('page-title', 'Genre Detail')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('genre.index') }}">Genre</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $genre->name }}</h3>
        </div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Name</dt>
                <dd class="col-sm-9">{{ $genre->name }}</dd>

                <dt class="col-sm-3">Created</dt>
                <dd class="col-sm-9">{{ $genre->created_at?->format('d M Y, H:i') }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('genre.edit', $genre) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('genre.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
@endsection
