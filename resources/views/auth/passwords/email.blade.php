@extends('layouts.app')
@section('content')
<div>{{ __('Reset Password') }}</div>
<div>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <button type="submit">{{ __('Send Password Reset Link') }}</button>
        </div>
    </form>
</div>
@endsection
