<?php

namespace App\Http\Controllers\dashboard\invitations\templates;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DetailController extends Controller
{
    public function show(String $code): View
    {
        $this->authorize('act-as-customer');
        $product = Product::where('code', $code)->where('is_active', 1)->first();
        $isProductPurchased = false;
        $paidOrder = Order::where('customer_id', Auth::user()->customer->id)->where('product_id', $product->id)->where('status', 'PAID')->first();

        if ($paidOrder) {
            $isProductPurchased = true;
        }

        return view('pages.dashboard.invitations.templates.detail', [
            'title' => 'Detail Template',
            'product' => $product,
            'isProductPurchased' => $isProductPurchased
        ]);
    }

    public function buy(String $id, Request $request): RedirectResponse
    {
        $message = '';
        return redirect('/dashboard/orders')->with('successMessage', $message);
    }
}
