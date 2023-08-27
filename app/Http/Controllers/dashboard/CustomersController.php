<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomersController extends Controller
{
    public function show(): View
    {
        $this->authorize('act-as-admin');
        $customers = Customer::with(['user'])->latest()->get();

        return view('pages.dashboard.customers', [
            'title' => 'Pengguna',
            'customers' => $customers
        ]);
    }
}
