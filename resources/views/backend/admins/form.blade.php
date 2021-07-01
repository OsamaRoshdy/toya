<div class="form-group row">
    {{ Form::label('name', __('admins.name'), ['class' => 'col-3']) }}
    <div class="col-9">
        {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
        @if ($errors->has("name"))
            <span class="form-text text-danger">{{$errors->first("name")}}</span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('email', __('admins.email'), ['class' => 'col-3']) }}
    <div class="col-9">
        {{ Form::email('email', old('email'), ['class' => 'form-control']) }}
        @if ($errors->has("email"))
            <span class="form-text text-danger">{{$errors->first("email")}}</span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('role_id', __('admins.permissions'), ['class' => 'col-3']) }}
    <div class="col-9">
        {{ Form::select('role_id',$roles ,old('role_id'), ['class' => 'form-control search']) }}
        @if ($errors->has("role_id"))
            <span class="form-text text-danger">{{$errors->first("role_id")}}</span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('password', __('admins.password'), ['class' => 'col-3']) }}
    <div class="col-9">
        {{ Form::password('password', ['class' => 'form-control']) }}
        @if ($errors->has("password"))
            <span class="form-text text-danger">{{$errors->first("password")}}</span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('password_confirmation', __('admins.password_confirmation'), ['class' => 'col-3']) }}
    <div class="col-9">
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
        @if ($errors->has("password_confirmation"))
            <span class="form-text text-danger">{{$errors->first("password_confirmation")}}</span>
        @endif
    </div>
</div>

