
{{ Form::open(['method' => 'DELETE', 'route' => [$section.'.destroy', $item->id]]) }}
    @permission($section.'.update')
        <a href="{{ route($section.'.edit', $item->id) }}" class="btn btn-outline-info btn-floating btn-blue-color">
            <i data-feather="edit"></i>
        </a>
    @endpermission
    @permission($section.'.delete')
        <button type="button" class="btn btn-outline-danger btn-floating deleteButton">
            <i class="ti-trash"></i>
        </button>
    @endpermission
{{ Form::close() }}
