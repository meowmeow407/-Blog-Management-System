@extends('layouts.layout')

@section('title', 'Admin Login - Chronicle')

@section('content')
<div class="login-wrapper-center">
    <div class="login-card">
        <div class="login-header">
            <span class="lock-icon"><i class="fa-solid fa-lock"></i></span>
            <h2>Admin Login</h2>
            <p>Enter your credentials to manage the portal blogs</p>
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

        <form action="{{ route('admin.login.submit') }}" method="POST" class="login-form">
            @csrf
            
            <div class="form-group-login">
                <label for="email"><i class="fa-solid fa-envelope"></i> Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="admin@blog.com" required autofocus>
            </div>

            <div class="form-group-login">
                <label for="password"><i class="fa-solid fa-key"></i> Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-login-submit">Login to Dashboard</button>
        </form>

        <div class="login-tip">
            <p>Don't have an admin account? <a href="{{ route('admin.register') }}" style="color: var(--accent); font-weight: 600;">Sign up here</a></p>
            <p style="margin-top: 10px; font-size: 0.75rem;"><i class="fa-solid fa-circle-info"></i> Demo: <strong>admin@blog.com</strong> / <strong>admin123</strong></p>
        </div>
    </div>
</div>
@endsection
