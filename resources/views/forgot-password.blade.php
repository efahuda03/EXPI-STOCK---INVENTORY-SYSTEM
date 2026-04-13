@extends('layout.front-app')
@section('content')
<div class="col-md-8 col-lg-6 col-xxl-4">
    <div class=" mb-0">
        <div class="card-body">
            <a href="javascript:void(0)" class="text-nowrap logo-img d-block mb-4 w-100">
                <h3 class="mb-0 text-primary" style="font-weight: 700;">Reset Password</h3>
                <small class="text-center text-muted">Enter your email address to receive a password reset link.</small>
            </a>
            <form action="{{ route('forgot_password.send') }}" method="POST">
            @csrf 
                <div class="mb-3">
                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                            placeholder="your.email@example.com" value="{{ old('email') }}" required>
                    
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 fs-4 mb-2 rounded-2">Send Reset Link</button>
                <a href="{{ route('login') }}" class="btn btn-danger w-100 fs-4 mb-4 rounded-2">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection