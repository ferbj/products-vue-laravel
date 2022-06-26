<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function index()
    {
        return view('home');
    }

    public function getProducts(){
        $products= Product::with('category')->paginate(20);
        return response()->json($products,200);
    }

}
