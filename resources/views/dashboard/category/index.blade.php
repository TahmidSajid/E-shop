@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col" class="text-center">SL</th>
        <th scope="col" class="text-center">Category Name</th>
        <th scope="col" class="text-center">Category Slug</th>
        <th scope="col" class="text-center">Category Photo</th>
        <th scope="col" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $key=>$category )
        <tr>
            <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $category->category_name }}</td>
            <td class="text-center">{{ $category->category_slug }}</td>
            <td class="text-center"><img src="{{asset('uploads/category_photos')}}/{{ $category->category_photo }}" alt=""></td>
            <td class="text-cernter">
                <div class="row">
                    <div class="col text-center">
                        <a class="btn btn-sm btn-primary" href="{{ route("category.show",$category->id) }}">Show</a>
                    </div>
                    <div class="col text-center">
                        <form action="{{ route("category.destroy",$category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-sm btn-danger"><button class="bg-danger text-white border border-0">Delete</button></a>
                        </form>
                    </div>
                    <div class="col text-center">
                        <a class="btn btn-sm btn-success" href="{{ route('category.edit',$category->id) }}">Edit</a>
                    </div>
                </div>
            </td>
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

