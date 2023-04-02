@extends('layouts.frontend')

@section('title', 'User Profile')

@section('content')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="#" rel="nofollow">Home</a>
                <span></span> User Profile
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            @if(session('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
            @endif
            <form method="post" action="{{ route('frontend.user.update') }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-25">
                        <h4>User Details</h4>
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" required id="first_name" name="first_name" placeholder="First name *" value="{{ optional($user->userDetail)->first_name ?? old('first_name') }}">
                        @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" id="last_name" name="last_name" placeholder="Last name *" value="{{ optional($user->userDetail)->last_name ?? old('last_name') }}">
                        @error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" id="address" name="address" placeholder="Address *" value="{{ optional($user->userDetail)->address ?? old('address') }}">
                        @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" name="city" placeholder="City / Town *" value="{{ optional($user->userDetail)->city ?? old('city') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" name="state" placeholder="State *" value="{{ optional($user->userDetail)->state ?? old('state') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" name="country" placeholder="Country *" value="{{ optional($user->userDetail)->country ?? old('country') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" id="zipcode" name="zipcode" placeholder="Postcode / ZIP *" value="{{ optional($user->userDetail)->zipcode ?? old('zipcode') }}">
                        @error('zipcode')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" id="phone" name="phone" placeholder="Phone *" value="{{ optional($user->userDetail)->phone ?? old('phone') }}">
                        @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" id="email" name="email" placeholder="Email address *" value="{{ $user->email ?? old('email') }}">
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" @error('password') checked @enderror name="is_update_password" id="updatePassword">
                                <label class="form-check-label label_info" data-bs-toggle="collapse" href="#collapsePassword" data-target="#collapsePassword" aria-controls="collapsePassword" for="updatePassword"><span>Update Your Password?</span></label>
                            </div>
                        </div>
                    </div>
                    <div id="collapsePassword" class="row collapse in @error('password') show @enderror">
                        <div class="col-md-4 form-group">
                            <input type="password" placeholder="Password" name="password">
                            @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="password" placeholder="Confirm password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="col-md-12 form-group mb-30">
                        <button type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

@endsection