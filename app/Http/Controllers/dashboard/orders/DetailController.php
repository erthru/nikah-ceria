<?php

namespace App\Http\Controllers\dashboard\orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
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

    public function customActionPut(String $id, Request $request): RedirectResponse
    {
        $ca = $request->query('ca');

        if ($ca == 'uploadTransferProof') {
            return $this->customActionPutUploadTransferProof($id, $request);
        }

        if ($ca == 'changeStatus') {
            return $this->customActionPutChangeStatus($id, $request);
        }

        return redirect('/dashboard/orders/' . $id)->with('errorMessage', 'Aksi tidak valid');
    }

    private function customActionPutUploadTransferProof(String $id, Request $request): RedirectResponse
    {
        $transfer_proof = $request->file('transfer_proof');
        $order = Order::findOrFail($id);
        $this->authorize('update-order-transfer-proof', $order);
        $transferProofName = '';

        if ($transfer_proof->getSize() / 1024 > 2000) {
            return redirect('/dashboard/orders' . $id)->with('successMessage', 'Ukuran file terlalu besar')->withInput();
        }

        if ($transfer_proof) {
            $transferProofName = time() + 1 . '.' . $transfer_proof->getClientOriginalExtension();
            $transfer_proof->move(public_path('/uploads'), $transferProofName);
        }

        Order::find($id)->update([
            'transfer_proof' => $transferProofName
        ]);

        return redirect('/dashboard/orders/' . $id)->with('successMessage', 'Berhasil mengunggah bukti transfer');
    }

    private function customActionPutChangeStatus(String $id, Request $request): RedirectResponse
    {
        $this->authorize('act-as-admin');
        $status = $request->input('status');

        if ($status == 'PAID') {
            $order = Order::findOrFail($id);
            $paidSameOrder = Order::where('customer_id', $order->customer_id)->where('product_id', $order->product_id)->where('status', 'PAID')->first();

            if ($paidSameOrder) {
                return redirect('/dashboard/orders/' . $id)->with('errorMessage', 'Orderan dangan produk & customer sudah pernah dibeli');
            }
        }

        Order::find($id)->update([
            'status' => $status
        ]);

        return redirect('/dashboard/orders/' . $id)->with('successMessage', 'Status berhasil diperbarui');
    }
}
