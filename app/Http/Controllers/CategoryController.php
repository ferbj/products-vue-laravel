<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //get all categories from database
    public function getCategories(){
        $categories = Category::get();
        return response()->json($categories,200);
    }
}
