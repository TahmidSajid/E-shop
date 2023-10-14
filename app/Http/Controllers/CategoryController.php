<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.category.index')->with([
            'categories'=>categories::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=> 'required',
            'category_slug'=> 'required',
            'category_photo'=> 'required|image',
        ]);
        $slug_name = Str::slug($request->category_slug);
        $new_name = $request->category_name .time(). "." . $request->file('category_photo')->getClientOriginalExtension();
        $image = Image::make($request->file('category_photo'))->resize(200,200);
        $image->save(base_path('public/uploads/category_photos/'.$new_name),100);
        Categories::insert([
            'category_name'=> $request->category_name,
            'category_slug'=> $slug_name,
            'category_photo'=> $new_name,
            'created_at'=> Carbon::now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(categories $category)
    {
        return view('dashboard.category.show',[
            'category'=>$category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $category)
    {
        return view("dashboard.category.edit",[
            'categories'=>$category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categories $category)
    {
        // return $category->category_photo;
        $request->validate([
            'category_name'=> 'required',
            'category_slug'=> 'required',
        ]);
        $slug_name = Str::slug($request->category_slug);
        if($request->category_photo){
            unlink(base_path('public/uploads/category_photos/'.$category->category_photo));
            $new_name = $request->category_name .time(). "." . $request->file('category_photo')->getClientOriginalExtension();
            $image = Image::make($request->file('category_photo'))->resize(200,200);
            $image->save(base_path('public/uploads/category_photos/'.$new_name),100);
            Categories::find($request->category_id)->update([
                'category_name'=> $request->category_name,
                'category_slug'=> $slug_name,
                'category_photo'=> $new_name,
            ]);
        }
        else{
            Categories::find($request->category_id)->update([
                'category_name'=> $request->category_name,
                'category_slug'=> $slug_name,
            ]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $category)
    {
        unlink(base_path('public/uploads/category_photos/'.$category->category_photo));
        categories::find($category->id)->delete();
        return back();
    }
}
