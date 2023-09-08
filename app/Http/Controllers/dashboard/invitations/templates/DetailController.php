<?php

namespace App\Http\Controllers\dashboard\invitations\templates;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
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

        return view('pages.dashboard.invitations.buy.templates.detail', [
            'title' => 'Detail Template',
            'product' => $product,
            'isProductPurchased' => $isProductPurchased
        ]);
    }

    public function buy(String $id, Request $request): RedirectResponse
    {
        $customer_id = $request->input('customer_id');
        $payment_method = $request->input('payment_method');
        $invoice = 'INV' . time() . rand(0, 100) . rand(101, 400);
        $product = Product::findOrFail($id);
        $finalPrice = $product->price;

        if ($product->discount && Carbon::now()->lte(reverseFormatedDate($product->discount_expires_at))) {
            $finalPrice = $finalPrice - $product->discount;
        }

        $unpaidOrder = Order::where('product_id', $product->id)->where('customer_id', $customer_id)->where('status', 'UNPAID')->first();

        if ($unpaidOrder) {
            return redirect('/dashboard/orders/' . $unpaidOrder->id)->with('successMessage', 'Pembelian template dalam proses, silahkan selesaikan proses orderan');
        }

        $order = Order::create([
            'invoice' => $invoice,
            'status' => 'UNPAID',
            'final_price' => $finalPrice,
            'payment_method' => $product->price == 0 ? 'BANK_TRANSFER' : $payment_method,
            'product_id' => $product->id,
            'customer_id' => $customer_id
        ]);

        if ($product->price == 0) {
            Order::find($order->id)->update([
                'status' => 'PAID'
            ]);
        }

        return redirect($product->price == 0 ? '/dashboard/invitations/add' : '/dashboard/orders/' . $order->id)->with('successMessage', $product->price == 0 ? 'Pembelian template berhasil' : 'Pembelian template dalam proses, silahkan selesaikan proses orderan');
    }
}
