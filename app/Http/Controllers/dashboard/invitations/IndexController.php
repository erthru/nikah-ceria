<?php

namespace App\Http\Controllers\dashboard\invitations;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function show(): View
    {
        $invitations = [];

        if (Gate::allows('act-as-admin')) {
            $invitations = Invitation::with(['product', 'customer'])->latest()->get();
        } else {
            $invitations = Invitation::with(['product', 'customer'])->where('customer_id', Auth::user()->customer->id)->latest()->get();
        }

        return view('pages.dashboard.invitations.index', [
            'title' => 'Undangan',
            'invitations' => $invitations
        ]);
    }
}
