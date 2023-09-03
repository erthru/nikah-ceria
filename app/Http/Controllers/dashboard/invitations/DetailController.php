<?php

namespace App\Http\Controllers\dashboard\invitations;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DetailController extends Controller
{
    public function show(String $id): View
    {
        $this->authorize('act-as-customer');
        $paidOrders = Order::with('product')->where('customer_id', Auth::user()->customer->id)->where('status', 'PAID')->get();
        $products = [];

        foreach ($paidOrders as $po) {
            array_push($products, $po->product);
        }

        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);

        return view('pages.dashboard.invitations.detail', [
            'title' => 'Detail Invitation',
            'invitation' => $invitation,
            'products' => $products
        ]);
    }
}
