@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col" class="text-center">Category Name</th>
        <th scope="col" class="text-center">Category Slug</th>
        <th scope="col" class="text-center">Category Photo</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="col" class="text-center">{{ $category->category_name }}</th>
            <th scope="col" class="text-center">{{ $category->category_slug }}</th>
            <td class="text-center"><img src="{{asset('uploads/category_photos')}}/{{ $category->category_photo }}" alt=""></td>
        </tr>
    </tbody>
</table>
@endsection

