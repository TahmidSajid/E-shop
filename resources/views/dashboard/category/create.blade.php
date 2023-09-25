@extends('layouts.dashboard')

@section('content')
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Category</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Category Name" name="category_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Slug</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Category Slug" name="category_slug">
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

