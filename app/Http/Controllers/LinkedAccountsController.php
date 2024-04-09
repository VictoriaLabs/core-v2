<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkedAccountsController extends Controller
{
    public function index()
    {
        return view('linked-accounts');
    }
}
