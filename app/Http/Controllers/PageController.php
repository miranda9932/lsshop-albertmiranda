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
     * Show details for a specific product.
     */
    public function details(Product $product)
    {
        return view('details', compact('product'));
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
