<div class="form-group row">
    {{ Form::label('name', __('admins.name'), ['class' => 'col-3']) }}
    <div class="col-9">
        {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
        @if ($errors->has("name"))
            <span class="form-text text-danger">{{$errors->first("name")}}</span>
        @endif
    </div>
</div>



