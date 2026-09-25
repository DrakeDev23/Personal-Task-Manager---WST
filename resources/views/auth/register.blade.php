@extends('layouts.app')

@section('content')
<div class="auth-center">
    <div class="auth-card">
        <div class="brand">
            <span class="logo">Taskero</span>
        </div>

        <h2>Create account</h2>
        <p class="muted">Register to start managing your tasks.</p>

        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <label for="name">Name</label>
            <input id="name" type="text" name="name" required>

            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>

            <label for="password_reg">Password</label>
            <div class="password-field">
                <input id="password_reg" type="password" name="password" required>
                <button type="button" id="togglePasswordReg" class="eye-btn" aria-label="Toggle password visibility">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>

            <label for="password_confirmation">Confirm password</label>
            <div class="password-field">
                <input id="password_confirmation" type="password" name="password_confirmation" required>
                <button type="button" id="togglePasswordConfirm" class="eye-btn" aria-label="Toggle password visibility">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>

            <div style="margin-top:24px">
                <button type="submit" class="btn login-btn">Register</button>
            </div>
        </form>

        <div class="auth-footer">Already have an account? <a href="{{ route('login') }}">Log in</a></div>
    </div>
</div>

@endsection