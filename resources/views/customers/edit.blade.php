@extends('layouts.app')

@section('content')
    <h1>Sửa khách hàng</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $customer->name) }}">
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" required value="{{ old('phone', $customer->phone) }}">
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $customer->address) }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Hủy</a>
    </form>
@endsection
