<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function show(): View
    {
        $usersTotal = [];
        $productsTotal = [];
        $invitationsTotal = [];
        $ordersTotal = [];

        if (Gate::allows('act-as-admin')) {
            $usersTotal = User::count();
            $productsTotal = Product::count();
            $invitationsTotal = Invitation::count();
            $ordersTotal = Order::count();
        } else {
            $invitationsTotal = Invitation::where('customer_id', Auth::user()->customer->id)->count();
            $ordersTotal = Order::where('customer_id', Auth::user()->customer->id)->count();
        }

        return view('pages.dashboard.index', [
            'title' => 'Dashboard',
            'usersTotal' => $usersTotal,
            'productsTotal' => $productsTotal,
            'invitationsTotal' => $invitationsTotal,
            'ordersTotal' => $ordersTotal
        ]);
    }
}
