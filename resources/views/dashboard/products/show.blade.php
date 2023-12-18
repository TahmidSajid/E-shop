@extends('layouts.dashboard')
@section('content')
<div class="col-lg-4 offset-lg-4">
    <div class="card mb-3">
        <img class="card-img-top img-fluid" src="{{ asset('uploads/thumbnail') }}/{{ $product->thumbnail }}" alt="Card image cap">
        <div class="card-header">
            <h5 class="card-title">product name: <span>{{ $product->name }}</span></h5>
        </div>
        <div class="card-body">
            <p class="card-text"><b>Short Description:</b> {{ $product->short_description }}</p>
            <p class="card-text"><b>Long Description:</b> {{ $product->long_description }}</p>
            <p class="card-text"><b>Additional Description:</b> {{ $product->additional_description }}</p>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-4">
                    <h6 class="text-primary">Purchase price</h6>
                    <p>{{ $product->purchase_price }} tk</p>
                </div>
                @if ($product->discount_price)
                <div class="col-lg-4">
                    <h6 class="text-danger">Discount price</h6>
                    <p>{{ $product->discount_price }} tk</p>
                </div>
                @endif
                <div class="col-lg-4">
                    <h6 class="text-success">Regular price</h6>
                    <p>{{ $product->regular_price }} tk</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
