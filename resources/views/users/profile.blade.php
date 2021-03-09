@extends('layouts.app')

@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="title">
                            <i class="nav-link-icon" data-feather="user"></i>
                            {{ __('site.profileInfo') }}
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-6 text-muted">{{ __('site.firstName') }}:</div>
                        <div class="col-6">{{ $user->first_name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-muted">{{ __('site.lastName') }}:</div>
                        <div class="col-6">{{ $user->last_name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-muted">{{ __('site.mobile') }}:</div>
                        <div class="col-6">{{ $user->mobile }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-muted">{{ __('site.email') }}:</div>
                        <div class="col-6">{{ $user->email }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-muted">{{ __('site.username') }}:</div>
                        <div class="col-6">{{ $user->username }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="title">
                            <i class="nav-link-icon" data-feather="user"></i>
                            {{ __('site.changePassword') }}
                        </h3>
                    </div>
                </div>
                {!! form_start($form) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            {!! form_row($form->password) !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success curve" type="submit" value="SaveAndNew" name="action"><i class="icon-check"></i> ذخیره</button>
                </div>
                {!! form_end($form, false) !!}
            </div>
        </div>
    </div>
@endsection

