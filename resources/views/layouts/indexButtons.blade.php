<div class="page-header">
    @permission($section.'.create')
    <a class="btn btn-success btn-white-color" href="{{ route($section.'.create') }}">
        <i data-feather="plus" class="mr-2"></i>
        {{ __('site.add') }}
    </a>
    @endpermission

    @if (!in_array($section, array('roles')))
        <button class="btn btn-primary btn-white-color btn-search">
            <i data-feather="search" class="mr-2"></i>
            {{ __('site.search') }}
        </button>
        <a class="btn btn-info btn-white-color" href="">
            <i data-feather="plus" class="mr-2"></i>
            {{ __('site.export') }}
        </a>
    @endif
</div>
