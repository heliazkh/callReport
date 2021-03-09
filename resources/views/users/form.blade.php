@extends('layouts.app')

@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="title">
                            <i class="nav-link-icon" data-feather="user-plus"></i>
                            {{ __('site.users.create') }}
                        </h3>
                    </div>
                </div>
                {!! form_start($form) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                {!! form_row($form->first_name) !!}
                            </div>
                            <div class="col-md-6">
                                {!! form_row($form->last_name) !!}
                            </div>
                            <div class="col-md-6">
                                {!! form_row($form->email) !!}
                            </div>
                            <div class="col-md-6">
                                {!! form_row($form->mobile) !!}
                            </div>
                            <div class="col-md-6">
                                {!! form_row($form->username) !!}
                            </div>
                            <div class="col-md-6">
                                {!! form_row($form->password) !!}
                            </div>
                            <div class="col-md-6">
                                {!! form_row($form->role_list) !!}
                            </div>
                            <div class="col-md-6">
                                {!! form_row($form->department_id) !!}
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
