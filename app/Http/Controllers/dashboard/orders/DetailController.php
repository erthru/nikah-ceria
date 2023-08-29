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

    public function customActionPutUploadTransferProof(String $id, Request $request): RedirectResponse
    {
        $transfer_proof = $request->file('transfer_proof');
        $order = Order::findOrFail($id);
        $this->authorize('update-order-transfer-proof', $order);
        $transferProofName = '';

        if ($transfer_proof) {
            $transferProofName = time() . '.' . $transfer_proof->getClientOriginalExtension();
            $transfer_proof->move(public_path('/uploads'), $transferProofName);
        }

        Order::find($id)->update([
            'transfer_proof' => $transferProofName
        ]);

        return redirect('/dashboard/orders/' . $id)->with('successMessage', 'Berhasil mengunggah bukti transfer');
    }

    public function customActionPutChangeStatus(String $id, Request $request): RedirectResponse
    {
        $this->authorize('act-as-admin');
        $status = $request->input('status');

        Order::find($id)->update([
            'status' => $status
        ]);

        return redirect('/dashboard/orders/' . $id)->with('successMessage', 'Status berhasil diperbarui');
    }
}
