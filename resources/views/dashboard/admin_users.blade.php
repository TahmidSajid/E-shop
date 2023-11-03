@extends('layouts.dashboard')
@section('content')
    @if ($admins)
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Admin</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('admins.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter your Name"
                                            name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" placeholder="enter an unique email"
                                            name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">add admin</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Admins</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>SL no</th>
                                        <th>NAME</th>
                                        <th>Email</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($admins as $key => $admin)
                                        <tr>
                                            <td><strong>{{ $key + 1 }}</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center"><img src="images/avatar/1.jpg"
                                                        class="rounded-lg mr-2" width="24" alt="" /> <span
                                                        class="w-space-no">{{ $admin->name }}</span></div>
                                            </td>
                                            <td>{{ $admin->email }} </td>
                                            <td>{{ $admin->created_at }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    @if (auth()->user()->id == $admin->id)
                                                        <a href="{{ route('profile_page') }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                    @else
                                                        <form action="{{ route('admins.destroy', $admin->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger shadow btn-xs sharp"
                                                                type="submit">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Customers</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>SL no</th>
                                <th>NAME</th>
                                <th>Email</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customers as $key => $customer)
                                <tr>
                                    <td><strong>{{ $key + 1 }}</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center"><img src="images/avatar/1.jpg"
                                                class="rounded-lg mr-2" width="24" alt="" /> <span
                                                class="w-space-no">{{ $customer->name }}</span></div>
                                    </td>
                                    <td>{{ $customer->email }} </td>
                                    <td>{{ $customer->created_at }}</td>
                                    <td>
                                        <div class="d-flex">
                                                <a href="{{ route('profile_page') }}"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <form action="#"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger shadow btn-xs sharp"
                                                        type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection
