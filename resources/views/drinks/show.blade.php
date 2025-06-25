<x-app-layout>
    <x-slot name="header">
        Chi tiết nước uống: {{ $drink->name }}
    </x-slot>

    <div class="p-4">
        <p><strong>Loại:</strong> {{ $drink->type }}</p>
        <p><strong>Giá:</strong> {{ number_format($drink->price, 2) }} VND</p>

        <a href="{{ route('drinks.index') }}" class="text-blue-500">← Quay lại danh sách</a>
    </div>
</x-app-layout>
