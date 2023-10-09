<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pS = Product::all();
        return view('frontend.home.home',['products'=>$pS]);
    }

}
