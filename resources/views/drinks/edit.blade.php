@extends('layouts.app')

@section('content')
    <h1>Sửa đồ uống</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('drinks.update', $drink->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên đồ uống</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $drink->name) }}">
        </div>

        <div class="form-group">
            <label for="type">Loại</label>
            <select name="type" id="type" class="form-control">
                <option value="soda" {{ $drink->type == 'soda' ? 'selected' : '' }}>Soda</option>
                <option value="juice" {{ $drink->type == 'juice' ? 'selected' : '' }}>Nước ép</option>
                <option value="tea" {{ $drink->type == 'tea' ? 'selected' : '' }}>Trà</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required value="{{ old('price', $drink->price) }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
        <a href="{{ route('drinks.index') }}" class="btn btn-secondary mt-3">Hủy</a>
    </form>
@endsection
