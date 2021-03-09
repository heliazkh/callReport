<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}"> {{ trans('site.dashboard') }} </a>
        </li>
        @if (isset($parentRoute))
            <li class="breadcrumb-item"><a href="{{ $parentRoute }}"> {{ $parentRouteName }}</a></li>
        @endif
        <li class="breadcrumb-item active" aria-current="page">{{ trans('site.' . $sectionTitle) }}</li>
    </ol>
</nav>
