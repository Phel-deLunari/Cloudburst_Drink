@extends('layouts.app')

@section('content')
    <h1>Thêm đơn hàng</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('orders.store') }}" method="POST" id="orderForm">
        @csrf
        <div class="form-group">
            <label for="customer_id">Khách hàng</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                @foreach (\App\Models\Customer::all() as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="drink_id">Nước uống</label>
            <select name="drink_id" id="drink_id" class="form-control" required>
                @foreach (\App\Models\Drink::all() as $drink)
                    <option value="{{ $drink->id }}" data-price="{{ $drink->price }}">{{ $drink->name }} ({{ number_format($drink->price, 2) }} VND)</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1" required>
        </div>
        <div class="form-group">
            <label for="total_price">Tổng giá</label>
            <input type="number" step="0.01" name="total_price" id="total_price" class="form-control" min="0" readonly>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Lưu</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Hủy</a>
    </form>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const drinkSelect = document.getElementById('drink_id');
                const quantityInput = document.getElementById('quantity');
                const totalPriceInput = document.getElementById('total_price');

                function calculateTotal() {
                    const price = parseFloat(drinkSelect.options[drinkSelect.selectedIndex].getAttribute('data-price')) || 0;
                    const quantity = parseInt(quantityInput.value) || 1;
                    const total = price * quantity;
                    totalPriceInput.value = total.toFixed(2);
                }

                drinkSelect.addEventListener('change', calculateTotal);
                quantityInput.addEventListener('input', calculateTotal);
                calculateTotal(); // Tính ngay khi tải trang
            });
        </script>
    @endpush
@endsection