@extends('layouts.app')

@section('title', isset($product) ? $product->name : 'Detalles del producto')
@section('header', 'Detalles del Producto')
@section('content')
    @if(isset($product))
        <h2>Editar: {{ $product->name }}</h2>

        <form method="POST" action="/details/{{ $product->id }}">
            @csrf
            @method('PUT')

            {{-- Preserve filters from query string --}}
            @if(request()->has('category'))
                @foreach((array) request()->query('category') as $c)
                    <input type="hidden" name="category[]" value="{{ $c }}">
                @endforeach
            @endif
            @if(request()->has('order_by_price'))
                <input type="hidden" name="order_by_price" value="1">
            @endif
            @if(request()->has('price_dir'))
                <input type="hidden" name="price_dir" value="{{ request('price_dir') }}">
            @endif

            <div style="margin-bottom:0.5rem;">
                <label>Nombre:<br>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" style="width:100%;padding:0.5rem;">
                </label>
            </div>

            <div style="margin-bottom:0.5rem;">
                <label>Categoría:<br>
                    <input type="text" name="category" value="{{ old('category', $product->category) }}" style="width:100%;padding:0.5rem;">
                </label>
            </div>

            <div style="margin-bottom:0.5rem;">
                <label>Precio:<br>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" style="width:200px;padding:0.5rem;">
                </label>
            </div>

            <div style="margin-bottom:0.5rem;">
                <label>Descripción:<br>
                    <textarea name="description" style="width:100%;padding:0.5rem;" rows="6">{{ old('description', $product->description) }}</textarea>
                </label>
            </div>

            <div style="display:flex;gap:1rem;align-items:center;">
                <button type="submit" style="background:#38a169;color:#fff;padding:0.5rem 1rem;border-radius:4px;border:none;">Guardar cambios</button>

                {{-- Delete form --}}
                <form method="POST" action="/details/{{ $product->id }}" onsubmit="return confirm('¿Eliminar este producto?');">
                    @csrf
                    @method('DELETE')
                    {{-- Preserve filters --}}
                    @if(request()->has('category'))
                        @foreach((array) request()->query('category') as $c)
                            <input type="hidden" name="category[]" value="{{ $c }}">
                        @endforeach
                    @endif
                    @if(request()->has('order_by_price'))
                        <input type="hidden" name="order_by_price" value="1">
                    @endif
                    @if(request()->has('price_dir'))
                        <input type="hidden" name="price_dir" value="{{ request('price_dir') }}">
                    @endif
                    <button type="submit" style="background:#e53e3e;color:#fff;padding:0.5rem 1rem;border-radius:4px;border:none;">Borrar producto</button>
                </form>

                <a href="/{{ request()->getQueryString() ? '?'.request()->getQueryString() : '' }}" style="color:#3182ce;">Volver al inicio</a>
            </div>
        </form>
    @else
        <p>Producto no encontrado.</p>
        <a href="/" style="color:#3182ce;">Volver al inicio</a>
    @endif
@endsection
