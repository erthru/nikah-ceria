<?php

namespace App\Http\Controllers\dashboard\products;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DetailController extends Controller
{
    public function show(String $id): View
    {
        $this->authorize('act-as-admin');
        $product = Product::findOrFail($id);

        return view('pages.dashboard.products.detail', [
            'title' => 'Detail Produk',
            'product' => $product
        ]);
    }

    public function update(String $id, Request $request): RedirectResponse
    {
        $this->authorize('act-as-admin');
        $name = $request->input('name');
        $description = $request->input('description');
        $thumbnail = $request->file('thumbnail');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $discount_expires_at = $request->input('discount_expires_at');
        $demo_url = $request->input('demo_url');
        $is_active = $request->input('is_active');

        if ($thumbnail->getSize() / 1024 > 2000) {
            return redirect('/dashboard/products/' . $id)->with('errorMessage', 'Ukuran file terlalu besar')->withInput();
        }

        if ($discount && $discount != '0' && !$discount_expires_at) {
            return redirect('/dashboard/products/' . $id)->with('errorMessage', '"Diskon berakhir pada" wajib diisi jika menggunakan diskon')->withInput();
        }

        if ((int)$price > 0 && (int)$discount >= (int)$price) {
            return redirect('/dashboard/products/' . $id)->with('errorMessage', 'Diskon tidak boleh lebih besar dari harga')->withInput();
        }

        $thumbnailName = '';

        if ($thumbnail) {
            $thumbnailName = time() + 1 . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads'), $thumbnailName);
        }

        Product::find($id)->update([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'discount' => $discount,
            'discount_expires_at' => $discount_expires_at,
            'demo_url' => $demo_url,
            'is_active' => $is_active == 'true' ? 1 : 0,
        ]);

        if ($thumbnailName) {
            Product::find($id)->update([
                'thumbnail' => $thumbnailName
            ]);
        }

        return redirect('/dashboard/products')->with('successMessage', 'Produk berhasil diperbarui');
    }

    public function destroy(String $id): RedirectResponse
    {
        $this->authorize('act-as-admin');
        $ordersTotal = Order::where('product_id', $id)->count();

        if ($ordersTotal > 0) {
            return redirect('/dashboard/products/' . $id)->with('errorMessage', 'Produk tidak dapat dihapus')->withInput();
        }

        Product::destroy($id);
        return redirect('/dashboard/products')->with('successMessage', 'Produk berhasil dihapus');
    }
}
