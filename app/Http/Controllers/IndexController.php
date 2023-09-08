<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function show(): View
    {
        $products = Product::latest()->take(6)->get();
        
        return view('pages.index', [
            'products' => $products
        ]);
    }
}
