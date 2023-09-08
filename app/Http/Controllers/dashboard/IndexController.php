<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function show(): View
    {
        $usersTotal = User::count();
        $productsTotal = Product::count();
        $invitationsTotal = Invitation::count();
        $ordersTotal = Order::count();

        return view('pages.dashboard.index', [
            'title' => 'Dashboard',
            'usersTotal' => $usersTotal,
            'productsTotal' => $productsTotal,
            'invitationsTotal' => $invitationsTotal,
            'ordersTotal' => $ordersTotal
        ]);
    }
}
