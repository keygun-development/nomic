<?php

namespace Keygun\Nomic\Http\Controllers;


class DashboardController extends Controller
{
    public function index()
    {
        return view('nomic::index');
    }
}
