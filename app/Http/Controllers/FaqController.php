<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Mengirim variabel $menu bersama dengan memanggil view
        return view('user.faq', ['menu' => 'faq']);
    }
}

