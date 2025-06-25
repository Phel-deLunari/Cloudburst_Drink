@extends('layouts.app')

@section('content')
    <h1>Danh sách khách hàng</h1>

    <a href="{{ route('customers.create') }}">Thêm</a>

    <table>
        <thead>
            <tr>
                <th>ID</th><th>Tên</th><th>SĐT</th><th>Địa chỉ</th><th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}">Sửa</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Xóa khách hàng này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
