@extends('layouts.app')

@section('content')
    <h1>Chi tiết khách hàng #{{ $customer->id }}</h1>
    <p>Tên: {{ $customer->name }}</p>
    <p>SĐT: {{ $customer->phone }}</p>
    <p>Địa chỉ: {{ $customer->address }}</p>
    <a href="{{ route('customers.index') }}">Quay lại</a>
@endsection
