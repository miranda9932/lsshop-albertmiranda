@extends('layouts.app')

@section('title', 'lsshop')
@section('header', 'LSSHOP')
@section('content')
    <h2>Catálogo</h2>

    <form method="GET" action="/" style="margin-bottom:1rem;">
        <fieldset style="border:1px solid #e2e8f0;padding:1rem;">
            <legend><strong>Filtrar por categoría</strong></legend>
            @if(!empty($categories))
                @foreach($categories as $cat)
                    <label style="margin-right:1rem;">
                        <input type="checkbox" name="category[]" value="{{ $cat }}" {{ in_array($cat, (array) $selected) ? 'checked' : '' }}> {{ $cat }}
                    </label>
                @endforeach
            @else
                <p>No hay categorías disponibles.</p>
            @endif
        </fieldset>

        <div style="margin-top:0.5rem;">
            <label>
                <input type="checkbox" name="order_by_price" value="1" {{ request()->boolean('order_by_price') ? 'checked' : '' }}> Ordenar por precio
            </label>
            <select name="price_dir" style="margin-left:0.5rem;">
                <option value="asc" {{ request('price_dir') === 'asc' ? 'selected' : '' }}>Ascendente</option>
                <option value="desc" {{ request('price_dir') === 'desc' ? 'selected' : '' }}>Descendente</option>
            </select>

            <button type="submit" style="margin-left:1rem;">Aplicar</button>
            <a href="/" style="margin-left:0.5rem;color:#666;">Restablecer</a>
        </div>
    </form>

    <div style="margin-bottom:1rem;">
        <a href="/products/create{{ request()->getQueryString() ? '?'.request()->getQueryString() : '' }}" style="background:#3182ce;color:#fff;padding:0.5rem 1rem;border-radius:4px;text-decoration:none;">Nuevo producto</a>
    </div>

    <table style="width:100%;border-collapse:collapse;">
        <thead>
            <tr style="background:#f1f5f9;text-align:left;">
                <th style="padding:0.5rem;border:1px solid #e2e8f0;">Nombre</th>
                <th style="padding:0.5rem;border:1px solid #e2e8f0;">Categoría</th>
                <th style="padding:0.5rem;border:1px solid #e2e8f0;">Precio</th>
                <th style="padding:0.5rem;border:1px solid #e2e8f0;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td style="padding:0.5rem;border:1px solid #e2e8f0;">{{ $product->name }}</td>
                    <td style="padding:0.5rem;border:1px solid #e2e8f0;">{{ $product->category }}</td>
                    <td style="padding:0.5rem;border:1px solid #e2e8f0;">€ {{ number_format($product->price, 2) }}</td>
                    <td style="padding:0.5rem;border:1px solid #e2e8f0;">
                        <a href="/details/{{ $product->id }}{{ request()->getQueryString() ? '?'.request()->getQueryString() : '' }}" style="color:#3182ce;">Ver detalles</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="padding:0.5rem;border:1px solid #e2e8f0;">No hay productos que mostrar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
