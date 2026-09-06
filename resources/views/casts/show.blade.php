@extends('layouts.app')

@section('title', 'Detail Cast')
@section('page-title', 'Detail Cast')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('cast.index') }}">Cast</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-2">Nama</dt>
                <dd class="col-sm-10">{{ $cast->nama }}</dd>

                <dt class="col-sm-2">Umur</dt>
                <dd class="col-sm-10">{{ $cast->umur }}</dd>

                <dt class="col-sm-2">Bio</dt>
                <dd class="col-sm-10">{{ $cast->bio }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('cast.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('cast.edit', $cast) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection