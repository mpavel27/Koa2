<?php

namespace App\Http\Controllers\ItemShop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function viewItemShop() {
        return view('itemshop.index');
    }
}
