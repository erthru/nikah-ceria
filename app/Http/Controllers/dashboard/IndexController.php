<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function show(): View
    {
        return view('pages.dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }
}
