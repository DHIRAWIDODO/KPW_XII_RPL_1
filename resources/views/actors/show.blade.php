@extends('layouts.app')

@section('title', 'Detail Actor')
@section('page-title', 'Detail Actor')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('actor.index') }}">Actor</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-2">Nama Peran</dt>
                <dd class="col-sm-10">{{ $actor->nama }}</dd>

                <dt class="col-sm-2">Film</dt>
                <dd class="col-sm-10">{{ $actor->film->judul ?? '-' }}</dd>

                <dt class="col-sm-2">Aktor (Cast)</dt>
                <dd class="col-sm-10">{{ $actor->cast->nama ?? '-' }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('actor.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('actor.edit', $actor) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection