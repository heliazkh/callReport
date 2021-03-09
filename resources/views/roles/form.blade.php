@extends('layouts.app')

@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="title">
                            <i class="nav-link-icon" data-feather="folder-plus"></i>
                            {{ __('site.roles.create') }}
                        </h3>
                    </div>
                </div>
                {!! form_start($form) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! form_row($form->name) !!}
                        </div>
                        <div class="col-md-6">
                            {!! form_row($form->display_name) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 m-t-b-10">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="selectAllPermissions">
                                    <label class="custom-control-label" for="selectAllPermissions">{{ __('site.selectAllPermissions') }}</label>
                                </div>
                            </div>
                        </div>
                        @foreach($permissionGroups as $i => $permissionGroup)
                            <div class="col-md-6">
                                <label class="role-label">{{ __('site.'.$i) }}</label>
                                @foreach($permissionGroup as $permission)
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            @if(isset($permissionsIdArray))
                                                <input type="checkbox" class="permissions custom-control-input" id="{{ $permission->id }}" name="permissions[]" {{ (in_array($permission->id, $permissionsIdArray) || $permission->name == 'dashboard.read') ? ' checked' : ' ' }} value="{{ $permission->id }}" {{ $permission->name == 'dashboard.read' ? 'onclick=\'return false\'' : '' }} id="{{ $permission->id }}">
                                            @else
                                                <input type="checkbox" class="permissions custom-control-input" id="{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}">
                                            @endif
                                            <label class="custom-control-label"  for="{{ $permission->id }}">
                                                {{ $permission->display_name }}
                                            </label>
                                        </div>
                                    </div><!-- /.input-group -->
                                @endforeach
                            </div>
                        @endforeach
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
