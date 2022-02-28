<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function viewIndex() {
        return view('index');
    }

    public function toMD5($pass, $hex = true)
    {
        $pass_st1 = sha1($pass, true);
        $output = sha1($pass_st1, !$hex);
        return '*' . strtoupper($output);
    }
}
