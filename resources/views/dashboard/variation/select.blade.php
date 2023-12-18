@extends('layouts.dashboard')
@section('content')
    <div class="row">
        @forelse ($categories as $category)
            <div class="col-lg-3">
                <a href="{{ route('variation_select_view',$category->id) }}">
                    <div class="card mb-3">
                        <img class="card-img-top img-fluid"
                            src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}" alt="Card image cap">
                        <div class="pt-4 pb-4 text-center">
                            <h6>category : {{ $category->category_name }} <span></span></h6>
                        </div>
                    </div>
                </a>
            </div>
        @empty
        @endforelse
    </div>
@endsection
