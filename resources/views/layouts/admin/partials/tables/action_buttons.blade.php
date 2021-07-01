<div class="btn-group">
    <a href="{{ route("dashboard." . $module .".edit", $model) }}" class="btn btn-sm btn-clean btn-icon-secondary" title="Edit">
        <i class="fas  fa-edit"></i>
    </a>
    {{ Form::open(['route' => ['dashboard.' . $module . '.destroy', $model], 'method' => 'Delete']) }}
    <button type="submit" class="btn btn-sm btn-clean btn-icon-danger">
        <i class="fas fa-trash"></i>
    </button>
    {{ Form::close() }}
</div>

