@extends('layouts.dashboard')
@section('content')
    <div class="row">
        @forelse ($products as $product)
            <div class="col-lg-3">
                <a href="{{route('variations',$product->id)}}">
                    <div class="card mb-3">
                        <img class="card-img-top img-fluid"
                            src="{{ asset('uploads/thumbnail') }}/{{ $product->thumbnail }}" alt="Card image cap">
                        <div class="pt-4 pb-4 text-center">
                            <h6>Product name :  <span> {{ $product->name }}</span></h6>
                        </div>
                    </div>
                </a>
            </div>
        @empty
        @endforelse
    </div>
@endsection
