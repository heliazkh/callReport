@extends('layouts.app')

@section('content')

    <div class="form-wrapper">
        <!-- logo -->
        <div id="logo">
            <img class="logo" src="assets/media/image/logo.png" alt="image">
            <img class="logo-dark" src="assets/media/image/logo-dark.png" alt="image">
        </div>
        <!-- ./ logo -->
        <!-- form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control text-left @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="{{ __('site.username') }}" dir="ltr" required autofocus>
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password"  class="form-control text-left @error('password') is-invalid @enderror"  name="password" placeholder="{{ __('site.password') }}" dir="ltr" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">{{ __('site.login') }}</button>
        </form>
        <!-- ./ form -->
    </div>
@endsection
