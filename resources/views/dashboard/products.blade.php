@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">products</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product )
                                <tr>
                                    <td>{{ $product->category_name }}</td>
                                    <td><img src="{{ asset('uploads/category_photos') }}/{{ $product->category_photo }}" alt="img"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

