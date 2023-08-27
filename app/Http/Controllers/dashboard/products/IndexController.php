<?php

namespace App\Http\Controllers\dashboard\products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function show(): View
    {
        $this->authorize('act-as-admin');
        $products = Product::latest()->get();

        return view('pages.dashboard.products.index', [
            'title' => 'Produk',
            'products' => $products,
        ]);
    }
}
