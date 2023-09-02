<?php

namespace App\Http\Controllers\dashboard\invitations;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AddController extends Controller
{
    public function show(): View
    {
        $this->authorize('act-as-customer');
        $paidOrders = Order::with('product')->where('customer_id', Auth::user()->customer->id)->where('status', 'PAID')->get();
        $products = [];

        foreach ($paidOrders as $po) {
            array_push($products, $po->product);
        }

        return view('pages.dashboard.invitations.add', [
            'title' => 'Tambah Undangan',
            'products' => $products,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorize('act-as-customer');
        $name = $request->input('name');
        $slug = $request->input('slug');
        $header = $request->input('header');
        $male_name = $request->input('male_name');
        $female_name = $request->input('female_name');
        $male_father_name = $request->input('male_father_name');
        $male_mother_name = $request->input('male_mother_name');
        $female_father_name = $request->input('female_father_name');
        $female_mother_name = $request->input('female_mother_name');
        $male_family_order = $request->input('male_family_order');
        $female_family_order = $request->input('female_family_order');
        $male_photo = $request->input('male_photo');
        $female_photo = $request->input('female_photo');
        $caption_1 = $request->input('caption_1');
        $caption_2 = $request->input('caption_2');
        $gallery_1 = $request->input('gallery_1');
        $gallery_2 = $request->input('gallery_2');
        $gallery_3 = $request->input('gallery_3');
        $gallery_4 = $request->input('gallery_4');
        $gallery_5 = $request->input('gallery_5');
        $gallery_6 = $request->input('gallery_6');
        $gallery_7 = $request->input('gallery_7');
        $gallery_8 = $request->input('gallery_8');
        $song = $request->input('song');
        $is_published = $request->input('is_published');
        $product_id = $request->input('product_id');

        return redirect();
    }
}
