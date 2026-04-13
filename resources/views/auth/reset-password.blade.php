@extends('layout.front-app')
@section('content')
<div class="col-md-8 col-lg-6 col-xxl-4">
    <div class="card-body">
        <h3 class="mb-2 text-primary" style="font-weight: 700;">Set New Password</h3>
        <p class="text-muted mb-4">Please enter your new password below to regain access to your account.</p>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                       value="{{ request()->email }}" required readonly>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                       placeholder="Min 8 characters" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" 
                       placeholder="Repeat your password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 fs-4 mb-2 rounded-2">Update Password</button>
        </form>
    </div>
</div>
@endsection