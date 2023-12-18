@extends('layouts.dashboard')
@section('content')
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Category</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Product Name" name="name" value="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <select placeholder="Category" class="form-control" name="category_id">
                                <option value="">select your category</option>
                                @foreach ($category as $cate)
                                    <option value="{{ $cate->id }}"  @if($cate->id == $product->category_id) selected @endif>{{ $cate->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Purchase Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="purchase Price" name="purchase_price" value="{{ $product->purchase_price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Regular Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Regular Price" name="regular_price" value="{{ $product->regular_price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Discount Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Discount Price" name="discount_price" value="{{ $product->discount_price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Short Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Short Description" name="short_description" value="{{ $product->short_description }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Long Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Long Description" name="long_description" value="{{ $product->long_description }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Additional Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Additional Description" name="additional_description" value="{{ $product->additional_description }}">
                        </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Old Thumbnail Image: <img src="{{ asset('uploads/thumbnail') }}/{{ $product->thumbnail }}" alt="" style="width: 150px"></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Thumbnail Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="Thumbnail Image" name="thumbnail">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
