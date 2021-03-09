@extends("layouts.app")

@section('content')
    @include('layouts.indexButtons')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="title">
                            <i class="nav-link-icon" data-feather="file"></i>
                            {{ __('site.roles') }}
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if($items->isNotEmpty())
                            <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>#</td>
                                <th>{{ __('site.title') }}</th>
                                <th>{{ __('site.displayName') }}</th>
                                <th>{{ __('site.tools') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->display_name }}</td>
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
