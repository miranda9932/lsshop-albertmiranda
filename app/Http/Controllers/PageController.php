<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
   
    public function main(Request $request)
    {
        // Get distinct non-empty categories
        $categories = Product::whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->pluck('category')
            ->toArray();

        // Selected categories from request (array) or default to all categories
        $selected = $request->query('category');
        if (is_null($selected)) {
            $selected = $categories;
        } elseif (!is_array($selected)) {
            $selected = [$selected];
        }

        $query = Product::query();

        if (!empty($selected)) {
            $query->whereIn('category', $selected);
        }

        if ($request->boolean('order_by_price')) {
            $dir = $request->get('price_dir', 'asc') === 'desc' ? 'desc' : 'asc';
            $query->orderBy('price', $dir);
        }

        $products = $query->get();

        return view('home', compact('products', 'categories', 'selected'));
    }

    /**
     * Mostrar detalles de un producto específico.
     */
    public function details(Product $product)
    {
        return view('details', compact('product'));
    }

    /**
     * Mostrar formulario para crear un producto.
     */
    public function create(Request $request)
    {
        // Mantener los filtros actuales para redirigir de vuelta tras la creación si se proporcionan
        $filters = $request->only(['category', 'order_by_price', 'price_dir']);
        return view('products.create', compact('filters'));
    }

    /**
     * Guardar nuevo producto.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Product::create($data);

        // Redirigir de vuelta al inicio con filtros si los hay
        $query = $request->only(['category', 'order_by_price', 'price_dir']);
        $qs = http_build_query($query);
        return redirect('/' . ($qs ? '?'.$qs : ''));
    }

    /**
     * Actualizar un producto.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $product->update($data);

        // Redirigir de vuelta al inicio preservando los filtros
        $query = $request->only(['category', 'order_by_price', 'price_dir']);
        $qs = http_build_query($query);
        return redirect('/' . ($qs ? '?'.$qs : ''));
    }

    /**
     * Eliminar un producto.
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        // Redirigir de vuelta al inicio preservando los filtros
        $query = $request->only(['category', 'order_by_price', 'price_dir']);
        $qs = http_build_query($query);
        return redirect('/' . ($qs ? '?'.$qs : ''));
    }

    public function contact()
    {
        return view('contact');
    }

    public function offers()
    {
        return view('offers');
    }
}
