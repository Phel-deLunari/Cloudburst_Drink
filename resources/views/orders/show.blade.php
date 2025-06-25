@extends('layouts.app')
@section('content')
    <h1>Chi tiết đơn hàng #{{ $order->id }}</h1>
    <p>Khách hàng: {{ $order->customer->name }}</p>
    <p>Nước uống: {{ $order->drink->name }}</p>
    <p>Số lượng: {{ $order->quantity }}</p>
    <p>Tổng giá: {{ $order->total_price }} VND</p>
    <a href="{{ route('orders.index') }}">Quay lại</a>
@endsection