<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function policy()
    {
        return view('pages.policy');
    }
}
