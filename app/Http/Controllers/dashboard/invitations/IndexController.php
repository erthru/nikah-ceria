<?php

namespace App\Http\Controllers\dashboard\invitations;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function show(): View
    {
        $invitations = Invitation::with(['product', 'customer'])->latest()->get();

        return view('pages.dashboard.invitations.index', [
            'title' => 'Undangan',
            'invitations' => $invitations
        ]);
    }
}
