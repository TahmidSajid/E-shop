@extends('layouts.dashboard')

@section('content')
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Category</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('category.update',$categories->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Category Name" name="category_name" value="{{ $categories->category_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Slug</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Category Slug" name="category_slug" value="{{ $categories->category_slug }}">
                        </div>
                    </div>
                    <div class="form-group row d-none">
                        <label class="col-sm-3 col-form-label">Category Id</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Category Slug" name="category_id" value="{{ $categories->id }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Photo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="category_photo">
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

