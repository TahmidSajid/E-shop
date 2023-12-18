<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Sizes;

class VariationsController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Variations $variations)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Variations $variations)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Variations $variations)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Variations $variations)
    // {
    //     //
    // }
    public function variation_select(){
        $categories = categories::all();
        return view('dashboard.variation.select',compact('categories'));
    }
    public function variation_select_view($id){
        $products = Products::where('category_id',$id)->get();
        return view('dashboard.variation.products',compact('products'));
    }
    public function variations($id){

        // Sizes::where('product_id',$id)->get()
        return view('dashboard.variation.index',compact('id'));
    }
}
