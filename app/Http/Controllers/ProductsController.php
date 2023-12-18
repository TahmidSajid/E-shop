<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::all();
        // return $category = Products::find(1)->catetoprod;
        return view('dashboard.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = categories::all();
        return view('dashboard.products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'purchase_price' => 'required',
            'regular_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'additional_description' => 'required',
            'thumbnail' => 'required|file',
        ]);
        $products = Products::create($request->except('_token'));

        if($request->hasFile('thumbnail')){
            $new_name = $request->name.time().".".$request->file('thumbnail')->getClientOriginalExtension();
            $img = Image::make($request->file('thumbnail'))->resize(300,200);
            $img->save(base_path('public/uploads/thumbnail/'.$new_name),80);
            Products::find($products->id)->update([
                'thumbnail'=> $new_name,
            ]);
        };
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {

        return view('dashboard.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        $category = categories::all();
        return view('dashboard.products.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'purchase_price' => 'required',
            'regular_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'additional_description' => 'required',
        ]);

        Products::find($product->id)->update([
            'name'=> $request->name,
            'category_id'=> $request->category_id,
            'purchase_price' => $request->purchase_price,
            'regular_price' => $request->regular_price,
            'discount_price' => $request->discount_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'additional_description' => $request->additional_description,
            'updated_at'=>Carbon::now(),
        ]);

        if($request->hasFile('thumbnail')){
            unlink(base_path('public/uploads/thumbnail/'.$product->thumbnail));
            $new_name = $request->name.time().".".$request->file('thumbnail')->getClientOriginalExtension();
            $img = Image::make($request->file('thumbnail'))->resize(150,150);
            $img->save(base_path('public/uploads/thumbnail/'.$new_name),90);
            Products::find($product->id)->update([
                'thumbnail'=> $new_name,
            ]);
        };
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        unlink(base_path('public/uploads/thumbnail/'.$product->thumbnail));
        Products::find($product->id)->delete();
        return back();
    }
}
