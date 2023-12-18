@extends('layouts.dashboard')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">SL</th>
                <th scope="col" class="text-center">Product Name</th>
                <th scope="col" class="text-center">Category</th>
                <th scope="col" class="text-center">Purchase price</th>
                <th scope="col" class="text-center">Regular price</th>
                <th scope="col" class="text-center">Discount Price</th>
                <th scope="col" class="text-center">Short Description</th>
                <th scope="col" class="text-center">Long Description</th>
                <th scope="col" class="text-center">Additional Description</th>
                <th scope="col" class="text-center">Thumbnail Photo</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $key=>$product)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td class="text-center">{{ $product->name }}</td>
                    <td class="text-center">{{ $product->catetoprod->category_name }}</td>
                    <td class="text-center">{{ $product->purchase_price }}</td>
                    <td class="text-center">{{ $product->regular_price }}</td>
                    <td class="text-center">{{ $product->discount_price }}</td>
                    <td class="text-center">{{ $product->short_description }}</td>
                    <td class="text-center">{{ $product->long_description }}</td>
                    <td class="text-center">{{ $product->additional_description }}</td>
                    <td class="text-center">
                        <img src="{{ asset('uploads/thumbnail') }}/{{ $product->thumbnail }}" alt="" style="width: 100px">
                    </td>
                    <td class="text-cernter">
                        <div class="dropdown">
                            <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('products.show',$product->id)}}">Show</a>
                                <a class="dropdown-item" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <div class="text-warning">no products are available</div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
