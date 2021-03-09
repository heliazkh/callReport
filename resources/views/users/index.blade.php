@extends('layouts.app')

@section('content')
    @include('layouts.indexButtons')

    <div class="row">
        <div class="col-md-12">
            {{-- start search box--}}
            <div class="card searchBox d-none">
                <div class="card-header">
                    <div class="card-title">
                        <h5 class="title">
                            {{ __('site.search') }}
                        </h5>
                    </div>
                </div>
                {!! form_start($searchForm) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            {!! form_row($searchForm->name) !!}
                        </div>
                        <div class="col-md-4">
                            {!! form_row($searchForm->mobile) !!}
                        </div>
                        <div class="col-md-4">
                            {!! form_row($searchForm->username) !!}
                        </div>
                        <div class="col-md-4">
                            {!! form_row($searchForm->role_list) !!}
                        </div>
                        <div class="col-md-4">
                            {!! form_row($searchForm->department_id) !!}
                        </div>
                        <div class="col-md-4">
                            {!! form_row($searchForm->activated) !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-info curve" type="submit" value="search" name="action">
                        <i class="icon-check"></i>
                        {{ __('site.search') }}
                    </button>
                </div>
                {!! form_end($searchForm, false) !!}
            </div>
            {{-- end search box--}}
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="title">
                            <i class="nav-link-icon" data-feather="users"></i>
                            {{ __('site.users') }}
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if($items->isNotEmpty())
                            <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>{{ __('site.fullName') }}</th>
                                <th>{{ __('site.username') }}</th>
                                <th>{{ __('site.mobile') }}</th>
                                <th>{{ __('site.role') }}</th>
                                <th>{{ __('site.department') }}</th>
                                <th>{{ __('site.status') }}</th>
                                <th>{{ __('site.tools') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->fullName }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>{{ $item->showRoles }}</td>
                                        <td>
                                            @if($item->department)
                                                {{ $item->department->title }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $item->status }}">فعال</span>
                                        </td>
                                        <td>
                                            @include('layouts.indexTools')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            @component('components.alert')
                                @slot('class')
                                    warning
                                @endslot
                                @slot('icon')
                                    Success Message
                                @endslot
                                {{__('site.noDataFound')}}
                            @endcomponent
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
