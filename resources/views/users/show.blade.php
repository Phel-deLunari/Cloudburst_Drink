@extends('layouts.app')

@section('content')
    <h1>Chi tiết người dùng #{{ $user->id }}</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Tên:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Ngày tạo:</strong> {{ $user->created_at }}</p>
        </div>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
@endsection