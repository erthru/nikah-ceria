<?php

namespace App\Http\Controllers\dashboard\invitations;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AddController extends Controller
{
    public function show(): View
    {
        $this->authorize('act-as-customer');
        $paidOrders = Order::with(['product'])->where('customer_id', Auth::user()->customer->id)->where('status', 'PAID')->get();
        $products = [];

        foreach ($paidOrders as $po) {
            array_push($products, $po->product);
        }
        
        return view('pages.dashboard.invitations.add', [
            'title' => 'Tambah Undangan',
            'products' => $products,
            'tempName' => 'Romeo & Juliet Wedding',
            'tempSlug' => 'romeo-and-juliet-wedding'
        ]);
    }
}
