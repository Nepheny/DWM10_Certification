@extends('layouts.app')
@section('content')
<h1>{{ __('Login') }}</h1>
<div class="form-container">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <table>
            <tr>
                <td><label for="email">{{ __('E-Mail Address') }}</label></td>
                <td><input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus></td>       
            </tr>
            <tr>
                <td><label for="password">{{ __('Password') }}</label></td>
                <td><input id="password" type="password" name="password" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="{{ __('Login') }}" class="button"></td>
            </tr>
        </table>
    </form>
</div>
@endsection