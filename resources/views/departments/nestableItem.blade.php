<li class="dd-item" data-id="{{ $item['id'] }}">
    <div class="dd3-content" data-id="{{ $item['id'] }}">
        <span>{{ $item['title'] }}</span>
    </div>
    <div class="pull-left" data-id="{{ $item['id'] }}">
        @permission('departments.delete')
        <a class="btn btn-xs btn-icon-only btn-tools quickDestroy" data-original-title="{{ trans('site.delete') }}" href="javascript:void(0);" data-url="{!! route('departments.destroy', $item['id']) !!}">
            <i class="fa fa-trash"></i>
        </a>
        @endpermission
        @permission('departments.update')
        <a class="btn btn-xs btn-icon-only btn-tools quickEdit" data-original-title="{{ trans('site.edit') }}" data-url="{!! route('departments.edit', $item['id']) !!}" href="javascript:void(0);">
            <i class="fa fa-edit"></i>
        </a>
        @endpermission
        @permission('departments.create')
        <a class="btn btn-xs btn-icon-only btn-tools quickCreate" data-original-title="{{ trans('site.add') }}" data-url="{!! route('departments.create') !!}" href="javascript:;">
            <i class="fa fa-plus"></i>
        </a>
        @endpermission
    </div>

    @if(isset($item['children']))
        <ol class="dd-list">
            @foreach($item['children'] as $item)
                @include('departments.nestableItem', ['item' => $item])
            @endforeach
        </ol>
    @endif

</li>
