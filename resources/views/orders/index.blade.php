@extends('layouts.app')
@section('content')
    <h1>Danh sách đơn hàng</h1>
    <a href="{{ route('orders.create') }}">Thêm</a>
    <table>
        <thead><tr><th>ID</th><th>Khách</th><th>Nước</th><th>S.lượng</th><th>Tổng</th><th>Hành động</th></tr></thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->drink->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td><a href="{{ route('orders.edit', $order->id) }}">Sửa</a> <a href="{{ route('orders.destroy', $order->id) }}" onclick="return confirm('Xóa?')">Xóa</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection