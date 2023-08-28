<?php

namespace App\Http\Controllers\dashboard\orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DetailController extends Controller
{
    public function show(String $id): View
    {
        $order = Order::with(['customer', 'product'])->findOrFail($id);
        return view('pages.dashboard.orders.detail', [
            'title' => 'Detail Orderan',
            'order' => $order,
        ]);
    }
}
