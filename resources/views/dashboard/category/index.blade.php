@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">SL</th>
        <th scope="col">Category Name</th>
        <th scope="col">Category Slug</th>
        <th scope="col">Category Photo</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category )
        <tr>
            <td>1</td>
            <td>{{ $category->category_name }}</td>
            <td>{{ $category->category_slug }}</td>
            <td><img src="{{asset('uploads/category_photos')}}/{{ $category->category_photo }}" alt=""></td>
          </tr>
        @empty
          <tr>
            <td></td>
            <td></td>
            <td class="align-middle"><div class="text-warning">no category available</div></td></tr>
        @endforelse
    </tbody>
  </table>
@endsection

