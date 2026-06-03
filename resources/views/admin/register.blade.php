@extends('layouts.layout')

@section('title', 'Admin Registration - Chronicle')

@section('content')
<div class="login-wrapper-center">
    <div class="login-card" style="width: 500px;">
        <div class="login-header">
            <span class="lock-icon" style="background: rgba(236, 72, 153, 0.1); color: var(--accent); border-color: rgba(236, 72, 153, 0.2);"><i class="fa-solid fa-user-plus"></i></span>
            <h2>Create Admin Account</h2>
            <p>Sign up to publish and manage blog posts on Chronicle</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li><i class="fa-solid fa-circle-exclamation"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.register.submit') }}" method="POST" class="login-form">
            @csrf
            
            <div class="form-group-login">
                <label for="name"><i class="fa-solid fa-user"></i> Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="John Doe" required autofocus>
            </div>

            <div class="form-group-login">
                <label for="username"><i class="fa-solid fa-at"></i> Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="johndoe" required>
            </div>

            <div class="form-group-login">
                <label for="mobile_no"><i class="fa-solid fa-phone"></i> Mobile Number</label>
                <input type="tel" name="mobile_no" id="mobile_no" value="{{ old('mobile_no') }}" placeholder="e.g. 9876543210" required>
            </div>

            <div class="form-group-login">
                <label for="email"><i class="fa-solid fa-envelope"></i> Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="john@example.com" required>
            </div>

            <div class="form-grid" style="gap: 16px; margin-bottom: 20px;">
                <div class="form-group-login" style="margin-bottom: 0;">
                    <label for="password"><i class="fa-solid fa-key"></i> Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" required>
                </div>

                <div class="form-group-login" style="margin-bottom: 0;">
                    <label for="password_confirmation"><i class="fa-solid fa-check-double"></i> Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn-login-submit" style="background: linear-gradient(135deg, var(--accent), var(--accent-hover)); box-shadow: 0 4px 15px rgba(236, 72, 153, 0.35);">Sign Up & Start Blogging</button>
        </form>

        <div class="login-tip" style="margin-top: 24px;">
            <p>Already have an admin account? <a href="{{ route('login') }}" style="color: var(--primary); font-weight: 600;">Login here</a></p>
        </div>
    </div>
</div>
@endsection
