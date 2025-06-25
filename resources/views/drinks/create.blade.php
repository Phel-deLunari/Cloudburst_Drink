@extends('layouts.app')

@section('content')
    <h1>Thêm đồ uống</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('drinks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên đồ uống</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="type">Loại</label>
            <select name="type" id="type" class="form-control">
                <option value="soda" {{ old('type') == 'soda' ? 'selected' : '' }}>Soda</option>
                <option value="juice" {{ old('type') == 'juice' ? 'selected' : '' }}>Nước ép</option>
                <option value="tea" {{ old('type') == 'tea' ? 'selected' : '' }}>Trà</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required value="{{ old('price') }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Lưu</button>
        <a href="{{ route('drinks.index') }}" class="btn btn-secondary mt-3">Hủy</a>
    </form>
@endsection
