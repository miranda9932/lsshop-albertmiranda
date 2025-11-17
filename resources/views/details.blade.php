@extends('layouts.app')

@section('title', isset($product) ? $product->name : 'Detalles del producto')
@section('header', 'Detalles del Producto')
@section('content')
    @if(isset($product))
        <h2>{{ $product->name }}</h2>
        <p><strong>Categoría:</strong> {{ $product->category }}</p>
        <p><strong>Precio:</strong> € {{ number_format($product->price, 2) }}</p>
        <h3>Descripción</h3>
        <p>{{ $product->description }}</p>
        <a href="/" style="color:#3182ce;">Volver al inicio</a>
    @else
        <p>Producto no encontrado.</p>
        <a href="/" style="color:#3182ce;">Volver al inicio</a>
    @endif
@endsection
