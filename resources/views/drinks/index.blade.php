@extends('layouts.app')

@section('content')
    <h1>Danh sách đồ uống</h1>

    <a href="{{ route('drinks.create') }}">Thêm</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Loại</th>
                <th>Giá</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($drinks as $drink)
                <tr>
                    <td>{{ $drink->id }}</td>
                    <td>{{ $drink->name }}</td>
                    <td>{{ $drink->type }}</td>
                    <td>{{ number_format($drink->price, 2) }} VND</td>
                    <td>
                        <a href="{{ route('drinks.edit', $drink->id) }}">Sửa</a> |
                        <form action="{{ route('drinks.destroy', $drink->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Xóa đồ uống này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if ($drinks->isEmpty())
                <tr>
                    <td colspan="5" style="text-align: center; color: gray;">Không có đồ uống nào.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
