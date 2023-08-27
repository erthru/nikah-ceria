<?php

namespace App\Http\Controllers\dashboard\products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AddController extends Controller
{
    public function show(): View
    {
        $this->authorize('act-as-admin');

        return view('pages.dashboard.products.add', [
            'title' => 'Tambah Produk',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorize('act-as-admin');
        $code = str_replace(' ', '', $request->input('code'));
        $name = $request->input('name');
        $description = $request->input('description');
        $thumbnail = $request->file('thumbnail');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $discount_expires_at = $request->input('discount_expires_at');
        $demo_url = $request->input('demo_url');
        $is_active = $request->input('is_active');

        if ($discount && $discount != '0' && !$discount_expires_at) {
            return redirect('/dashboard/products/add')->with('errorMessage', '"Diskon berakhir pada" wajib diisi jika menggunakan diskon')->withInput();
        }

        if ((int)$discount >= (int)$price) {
            return redirect('/dashboard/products/add')->with('errorMessage', 'Diskon tidak boleh lebih besar dari harga')->withInput();
        }

        $product = Product::where('code', $code)->first();

        if ($product) {
            return redirect('/dashboard/products/add')->with('errorMessage', 'Kode telah ada')->withInput();
        }

        $thumbnailName = '';

        if ($thumbnail) {
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads'), $thumbnailName);
        }

        Product::create([
            'code' => $code,
            'name' => $name,
            'description' => $description,
            'thumbnail' => $thumbnailName,
            'price' => $price,
            'discount' => $discount,
            'discount_expires_at' => $discount_expires_at,
            'demo_url' => $demo_url,
            'is_active' => $is_active == 'true' ? 1 : 0,
        ]);

        return redirect('/dashboard/products')->with('successMessage', 'Produk berhasil dibuat');
    }
}
