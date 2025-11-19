@extends('layouts.app')

@section('title', 'Crear producto')
@section('header', 'Crear nuevo producto')
@section('content')
    <form method="POST" action="/products">
        @csrf

        {{-- Preserve filters if provided --}}
        @if(!empty($filters['category']))
            @foreach((array) $filters['category'] as $c)
                <input type="hidden" name="category[]" value="{{ $c }}">
            @endforeach
        @endif
+        @if(!empty($filters['order_by_price']))
+            <input type="hidden" name="order_by_price" value="1">
+        @endif
+        @if(!empty($filters['price_dir']))
+            <input type="hidden" name="price_dir" value="{{ $filters['price_dir'] }}">
+        @endif
+
        <div style="margin-bottom:0.5rem;">
            <label>Nombre:<br>
                <input type="text" name="name" value="{{ old('name') }}" style="width:100%;padding:0.5rem;">
            </label>
        </div>

        <div style="margin-bottom:0.5rem;">
            <label>Categoría:<br>
                <input type="text" name="category" value="{{ old('category') }}" style="width:100%;padding:0.5rem;">
            </label>
        </div>

        <div style="margin-bottom:0.5rem;">
            <label>Precio:<br>
                <input type="number" step="0.01" name="price" value="{{ old('price', 0) }}" style="width:200px;padding:0.5rem;">
            </label>
        </div>

        <div style="margin-bottom:0.5rem;">
            <label>Descripción:<br>
                <textarea name="description" style="width:100%;padding:0.5rem;" rows="6">{{ old('description') }}</textarea>
            </label>
        </div>

        <button type="submit" style="background:#3182ce;color:#fff;padding:0.5rem 1rem;border-radius:4px;border:none;">Crear producto</button>
    </form>
@endsection
