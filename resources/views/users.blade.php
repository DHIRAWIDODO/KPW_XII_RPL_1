@extends('layouts.app')

@section('title', 'Users')
@section('page-title', 'Users')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Users</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Users</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th>Nickname</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered</th>
                        <th>Last Login</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users ?? [] as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->username ?? '-' }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at?->format('d M Y, H:i') }}</td>
                            <td>{{ $user->last_login_at ? $user->last_login_at->format('d M Y, H:i') : 'Belum pernah login' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-4">
                                No users to display yet. Pass a <code>$users</code> collection from the controller.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection