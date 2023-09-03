<?php

namespace App\Http\Controllers\dashboard\invitations\buy\templates;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function show(): View
    {
        $this->authorize('act-as-customer');
        $products = Product::where('is_active', 1)->latest()->get();

        return view('pages.dashboard.invitations.templates.index', [
            'title' => 'Template',
            'products' => $products,
        ]);
    }
}
