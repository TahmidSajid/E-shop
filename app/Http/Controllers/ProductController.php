<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function products_page(Request $request){
        $products = categories::where('category_slug',$request->slug)->get();

        return view('dashboard.products',compact('products'));
    }
}
