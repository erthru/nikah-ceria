<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function show(): View
    {
        return view('pages.index');
    }
}
