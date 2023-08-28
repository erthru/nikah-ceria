<?php

namespace App\Http\Controllers\dashboard\orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function show(): View
    {
        $orders = [];

        if (Auth::user()->role === 'CUSTOMER') {
            $orders = Order::with(['product', 'customer'])->where('customer_id', Auth::user()->customer->id)->latest()->get();
        } else {
            $orders = Order::with(['product', 'customer'])->latest()->get();
        }

        return view('pages.dashboard.orders.index', [
            'title' => 'Orderan',
            'orders' => $orders
        ]);
    }
}
