@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            @if (auth()->user()->profile_photo)
                                <img src="{{ asset('uploads/profile_pictures') }}/{{ auth()->user()->profile_photo }}"
                                    class="img-fluid rounded-circle" alt="">
                            @else
                                <img src="{{ asset('dashboard-assets') }}/images/default_profile.png"
                                    class="img-fluid rounded-circle" alt="">
                            @endif

                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
                                <p>UX / UI Designer</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">{{ auth()->user()->email }}</h4>
                                <p>Email</p>
                            </div>
                            <div class="dropdown ml-auto">
                                <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown"
                                    aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                        </g>
                                    </svg></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View
                                        profile</li>
                                    <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close
                                        friends</li>
                                    <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
                                    <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Profile Picture Upload</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ url('profile/photo/upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control input-default " placeholder="input-default"
                                    name="profile_pic">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Upload Your Photo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>password change</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ url('password/update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="password" class="form-control input-default " placeholder="Current Password"
                                    name="old_password">
                            </div>
                            @error('old_password')
                                <div class="txt-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <input type="password" class="form-control input-default " placeholder="New Password"
                                    name="password">
                                @error('password')
                                    <div class="txt-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-default " placeholder="Confirm Password"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="txt-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Update your password</button>
                            <div class="form-group">
                                @if (session('success'))
                                    {{ session('success') }}
                                @endif
                                @if ('unsuccess')
                                    {{ session('unsuccess') }}
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
        @if (auth()->user()->status=='verified')
                <div class="card">
                    <div class="card-header">
                        <h4>Your Number</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <h4>Your Phone Number: {{ auth()->user()->number }}</h4>
                            <p>Status : <span class=" text-success">{{ auth()->user()->status }}</span></p>
                        </div>
                        @if (auth()->user()->update_limit!=0)
                            <div class="basic-form">
                                <a href="{{url('update/phone/number')}}" class="btn btn-info btn-sm">Update Phone Number</a>
                            </div>
                            <div class="basic-form">
                                <p class="text-info">You have {{ auth()->user()->update_limit }} chance remaining to update</p>
                            </div>
                        @else
                            <div class="basic-form">
                                <p class="text-warning">You have exceeded the updating limit</p>
                            </div>
                        @endif
                    </div>
                </div>
        @else
            @if (auth()->user()->number)
                <div class="card">
                    <div class="card-header">
                        <h4>Verify Your Number</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <h4>Your Phone Number: {{ auth()->user()->number }}</h4>
                            <p>Status : <span class=" text-danger">{{ auth()->user()->status }}</span></p>
                            @if ($usr_id==false)
                                <a href="{{ url('verify/phone/number') }}" class="btn btn-primary btn-sm">Verify</a>
                            @else
                                <form action="{{ url('/verify/otp') }}" method="POST" class="mt-4">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control input-default " placeholder="Your OTP"
                                            name="otp_number">
                                    </div>
                                    @error('otp_number')
                                        <div class="txt-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="btn btn-primary btn-sm">Verify Your Number</button>
                                </form>
                            @endif
                        </div>
                        @if (session('otp_sent'))
                            <div class="alert alert-success mt-4">{{ session('otp_sent') }}</div>
                        @endif
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header">
                        <h4>Add your number</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('/add/phone/number') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control input-default "
                                        placeholder="Add Phone Number" name="phone_number">
                                </div>
                                @error('phone_number')
                                    <div class="txt-danger">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary btn-sm">Add Phone Number</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endif
        </div>
    </div>
@endsection
